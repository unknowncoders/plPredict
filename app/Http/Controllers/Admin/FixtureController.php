<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\FixtureRequest;
use App\Http\Controllers\Controller;

use App\Fixture;
use App\Prediction;
use App\Club;

class FixtureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(FixtureRequest $request)
    {

            $fixture = new Fixture;
            $fixture->home_club_id = $request->home_club_id;
            $fixture->away_club_id = $request->away_club_id;
            if(empty($request->home_score)){
                    $fixture->home_score = null;
            }else{
                    $fixture->home_score = $request->home_score;
            }

            if(empty($request->away_score)){
                    $fixture->away_score = null;
            }else{
                    $fixture->away_score = $request->away_score;
            }
            $fixture->gameweek_id = $request->gameweek_id;
            $fixture->kickoff   = $request->kickoff;

            $fixture->save();

            return redirect('/admin/gameweek/'.$fixture->gameweek_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
            $fixture = Fixture::findOrFail($id);

            $clubs = Club::lists('name','id')->toArray();
            return view('admin.fixture.edit',compact('fixture','clubs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
            $fixture = Fixture::findOrFail($id);
            $gwId = $fixture->gameweek->id;
            $fixture->delete();

            return redirect('/admin/gameweek/'.$gwId);
    }

    public function compute($id)
    {
            $fixture = Fixture::findOrFail($id);
            $gameweek = $fixture->gameweek;

            if($fixture->home_score === null or $fixture->away_score === null){
                    return redirect('/admin/gameweek/'.$gameweek->id);
            }

            $allPredictions = Prediction::where('fixture_id',$fixture->id)->get();

            foreach($allPredictions as $prediction){
                    $prediction->grade = $prediction->grading($fixture);
                    $boostId = $prediction->user->gameweeks()->where('gameweek_id',$fixture->gameweek->id)->first()->pivot->boost_id;
                    if($boostId == $prediction->fixture->id){
                            $prediction->grade += 5;
                    }
                    $prediction->save();
            }
                    return redirect('/admin/gameweek/'.$gameweek->id);
    }
}
