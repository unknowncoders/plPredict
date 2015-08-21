<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gameweek;
use App\Prediction;
use App\Fixture;
use App\Month;
use App\Club;

class GameweekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
            $months = Month::lists('name','id')->toArray();

            $runningGameweeks =  Gameweek::incomplete()->get()->filter(function($gw){ return $gw->started(); });

            $runningGameweeks->each(function($gw,$key){
                    $gw->overFixtureCnt = $gw->fixtures()->over()->get()->count(); 
                    $gw->pendingFixtureCnt = $gw->fixtures()->get()->filter(function($fxt){
                            return ($fxt->isClosed() and !$fxt->isOver());
                    })->count(); 
            });

            $upcomingGameweeks = Gameweek::incomplete()->get()->filter(function($gw){ return !$gw->started(); });
            $completeGameweeks = Gameweek::complete()->get();


            return view('admin.gameweek.index',compact('months','runningGameweeks','upcomingGameweeks','completeGameweeks'));
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
    public function store(Request $request)
    {
            $this->validate($request,['month_id'=>'required']);

            $gameweek = new Gameweek;

            $gameweek->month_id = $request->month_id;
            $gameweek->complete = false;

            $gameweek->save();

            return redirect('/admin/gameweek');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
            $gameweek = Gameweek::findOrFail($id);
            
            $gameweek->overFixtures = $gameweek->fixtures()->over()->get();
            $gameweek->pendingFixtures = $gameweek->fixtures()->get()->filter(function($fxt){
                        return ($fxt->isClosed() and !$fxt->isOver());
            }); 

            $gameweek->upcomingFixtures = $gameweek->fixtures()->get()->filter(function($fxt){
                        return !$fxt->isClosed();
            });

            $gameweek->fxtCnt = $gameweek->overFixtures->count() 
                                + $gameweek->pendingFixtures->count() 
                                + $gameweek->upcomingFixtures->count();
                
            $clubs = Club::lists('name','id')->toArray();
            return view('admin.gameweek.show',compact('gameweek','clubs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function compute($id)
    {
            $gameweek = Gameweek::find($id);
            $this->performComputations($gameweek);

            return redirect('/admin/gameweek');

    }

    public function complete($id)
    {
            $gameweek = Gameweek::find($id);
            $this->performComputations($gameweek);
            $gameweek->complete = true;

            $gameweek->save();

            return redirect('/admin/gameweek');
    }

    private function performComputations($gameweek)
    {
            $users = $gameweek->predictors;
            $month = $gameweek->month;
            $allGameweeks = $month->gameweeks()->get()->filter(function($gw_inst){
                                    return $gw_inst->hasCompletedFixture();
            });

            //Gameweek User Score
            foreach($users as $user){

                    $gameweekExists = $user->gameweeks->contains($gameweek->id);

                    if(!$gameweekExists){ continue; }

                    $predictions = $gameweek->predictions()->where('user_id',$user->id)->get();

                    $score = 0;
                    foreach($predictions as $prediction){
                            $score += $prediction->score();
                    }

                    //$user->gameweekScore = $score;

                    $user->gameweeks()->updateExistingPivot($gameweek->id,['score'=>$score],false);

                    $monthExists = $user->months->contains($month->id);

                    if(!$monthExists){  
                            $user->months()
                                 ->attach($month->id,['rank'=>null]);
                    }

                    $monthScore = 0;
                    foreach($allGameweeks as $gw){
                            $gw_user = $user->gameweeks()->where('gameweek_id',$gw->id)->first();
                            if($gw_user){
                                $monthScore += $gw_user->pivot->score;
                            }
                    }

                    //$user->monthScore = $monthScore;

                    $overallScore = 0;
                    foreach($user->gameweeks as $ugw){
                            $overallScore += $user->gameweeks()->where('gameweek_id',$ugw->id)->first()->pivot->score;
                    }

                    $user->score = $overallScore;

                    $user->save();

            }
    }
}
