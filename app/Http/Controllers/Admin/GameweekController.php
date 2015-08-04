<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gameweek;
use App\Month;

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
            return view('admin.gameweek.show',compact('gameweek'));
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
}
