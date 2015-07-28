<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BadgeController extends Controller
{
        public function index(){

                $badges = \App\Badge::all();

                if(\Auth::check()){
                    $user = \Auth::user();
                    return view('badges.index',compact('badges','user'));
                }

                return view('badges.index',compact('badges'));
        }
}
