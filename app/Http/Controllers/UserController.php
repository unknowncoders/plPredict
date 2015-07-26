<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

        public function __construct(){
                $this->middleware('auth',['except'=>'show']);
                $this->middleware('incomplete',['only'=>['getComplete','postComplete']]);
        }

        public function show(\App\User $user){
                return view('users.show',compact('user'));
        }

        public function getComplete(){

                $clubs = \App\Club::lists('name','id')->toArray();

                $clubs = array_merge([null=>'-- Favorite club --'],$clubs);

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
