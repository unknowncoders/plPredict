<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BadgeController extends Controller
{

        public function __construct(){
               $this->middleware('auth'); 
        }

        public function index(){

                $badges = \App\Badge::all();

                $nameOfPage = 'badges';

                if(\Auth::check()){
                    $user = \Auth::user();
                    return view('badges.index',compact('badges','user','nameOfPage'));
                }


                return view('badges.index',compact('badges','nameOfPage'));
        }
}
