<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StandingsController extends Controller
{
        public function __construct(){
               $this->middleware('auth'); 
        }

        public function index(\App\Gameweek $gameweek = null,\App\Month $month = null){

                $user = null;
                $users = \App\User::ranked()->orderBy('rank')->get();
                $lastFixture = \App\Fixture::over()->orderBy('kickoff','desc')->first();

                $activeTabs = ['active','',''];


                if(!$month or !$month->hasStarted()){
                        $month = $lastFixture->gameweek->month;
                }else{

                        $activeTabs = ['','active',''];
                }

                if(!$gameweek or !$gameweek->hasCompletedFixture()){
                        $gameweek = $lastFixture->gameweek;
                }else{
                        $activeTabs = ['','','active'];
                }
                

                if(\Auth::check()){
                        $user = \Auth::user();
                }

                    $months = \App\Month::orderBy('id','desc')->get()->filter(function ($month){
                                                    return $month->hasStarted();
                                            });

                    $gameweeks = \App\Gameweek::orderBy('id','desc')->get()->filter(function ($gw){
                                                    return $gw->hasCompletedFixture(); 
                                            });


                    $gameweekUsers = $gameweek->predictors()->orderBy('gameweek_user.rank','asc')->get();

                    $monthUsers = $month->users()->orderBy('month_user.rank','asc')->get();

                $nameOfPage = 'standings';

                return view('pages.standings',compact('gameweeks','months','users','gameweekUsers','monthUsers','month','gameweek','user','activeTabs','nameOfPage'));

        }
}
