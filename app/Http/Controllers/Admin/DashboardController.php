<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Pic;
use App\Club;
use App\Badge;
use App\Admin;
use App\Fixture;
use App\Gameweek;

class DashboardController extends Controller
{
        public function index(){


                $usersData = [];
                $usersData['count'] = User::all()->count();
                $usersData['incompleteCount'] = User::where('status',0)->count();

                $picsData = [];
                $picsData['count'] = Pic::all()->count();

                $clubsData = [];
                $clubsData['count'] = Club::all()->count();

                $badgesData = [];
                $badgesData['count']= Badge::all()->count();

                $fixtures = Fixture::all();
                $fixturesData = [];
                $fixturesData['count'] = $fixtures->count();
                $fixturesData['overCount'] = $fixtures->filter(function($fxt){
                        return $fxt->isOver();
                })->count();
                $fixturesData['closedNotOverCount'] = $fixtures->filter(function($fxt){
                        return ($fxt->isClosed() and !$fxt->isOver());
                })->count();

                $gameweeks = Gameweek::all();
                $gameweeksData = [];
                $gameweeksData['count'] = $gameweeks->count();
                $gameweeksData['completeCount'] = Gameweek::complete()->get()->count();
                $gameweeksData['pendingCount'] = Gameweek::incomplete()->get()->filter(function($gw){
                        return $gw->hasCompletedFixture();
                
                })->count();

                $adminsData = [];
                $adminsData['count'] = Admin::all()->count();


                return view('admin.dashboard.index',compact('usersData','picsData','clubsData','badgesData','fixturesData','gameweeksData','adminsData'));
        }
}
