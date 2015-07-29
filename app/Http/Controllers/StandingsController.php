<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StandingsController extends Controller
{
        public function index(\App\Gameweek $gameweek = null,\App\Month $month = null){

                $users = \App\User::orderBy('rank')->paginate(40);

                if($gameweek and $gameweek->complete){

                }else if($month and $month->hasCompletedGameweeks()){

                }else{

                }

        }
}
