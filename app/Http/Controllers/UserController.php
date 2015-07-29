<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class UserController extends Controller
{

        public function __construct(){
                $this->middleware('auth',['except'=>'show']);
                $this->middleware('incomplete',['only'=>['getComplete','postComplete']]);
        }

        public function show(\App\User $user,\App\Gameweek $gameweekInFocus = null){

                //Get the last "over" fixture
                $lastFixture = \App\Fixture::over()->orderBy('kickoff','desc')->first();

                if(!$gameweekInFocus or !$gameweekInFocus->hasCompletedFixture()){

                    //Get the corresponding gameweek and eager load its fixtures
                    $gameweekInFocus = $lastFixture->gameweek()->with(['fixtures'=>function ($query){
                                                                $query->over();
                                                    }])->first();
                }else{
                    $gameweekInFocus->load(['fixtures'=>function ($query){
                                                                $query->over();
                                                    }]);
                }

                $gameweeks = \App\Gameweek::orderBy('id','desc')->get()->filter(function ($gw){
                                                return $gw->hasCompletedFixture(); 
                                            });

                $badges = $user->badges()->orderBy('badge_user.gameweek_id','asc')->get();

                return view('users.show',compact('user','gameweekInFocus','gameweeks','lastFixture','badges'));
        }

        public function getComplete(){

                $clubs = \App\Club::lists('name','id')->toArray();

                $clubs = array_merge([0=>'-- Favorite club --'],$clubs);

                return view('pages.complete',compact('clubs'));

        }

        public function postComplete(Requests\CompleteProfileRequest $request){


                $input = $request->all();
                $usr = $request->user();
                $usr->username = $input['username'];
                $usr->status=1;
        /**   we are not taking any password for input
               if($input['password']){
                    $usr->password = \Hash::make($input['password']);
                    $usr->status=2;
                }
            **/
                if($input['club_id']){
                    $usr->club_id = $input['club_id'];
                }

                $usr->save();

                return redirect('/');

        }

}
