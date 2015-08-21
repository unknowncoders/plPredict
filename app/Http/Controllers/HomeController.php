<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct(){

            $this->middleware('auth');
            $this->middleware('complete');

    }

    /**
     * Show the application home (predict) page to the user
     * 
     * @return Response
     */
    public function index()
    {
            $user = \Auth::user();
            $gws = \App\Gameweek::incomplete()
                        ->take(2)
                        ->with('fixtures')
                        ->with(['fixtures.predictions'=> function($query) use($user){
                                $query->where('user_id',$user->id);
                        }])
                        ->get();

            foreach($gws as $gw){
                    $userGameweek = $user->gameweeks()->where('gameweek_id',$gw->id)->first();

                    $boostId = null;
                    $boostedClosed = false;
                    if($userGameweek){
                        $boostId = $userGameweek->pivot->boost_pid; 
                        if($boostId) $boostedClosed = \App\Fixture::find($boostId)->isClosed();
                    }

                    $gw->boostId = $boostId;
                    $gw->boostedClosed = $boostedClosed;
            }

            $nameOfPage = 'home';

            return view('pages.home',compact('gws','user','nameOfPage')); 
    }

}
