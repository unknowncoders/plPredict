<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PredictionController extends Controller
{

        protected $user;

        public function __construct(){
                $this->user = \Auth::user();
        }

        public function store(Request $request){
                $input = $request->all();


                $predictions =[];

                foreach($input['home_score'] as $key => $score){
                        $predictions[$key]['home_score'] = $score;
                }

                foreach($input['away_score'] as $key => $score){
                        $predictions[$key]['away_score'] = $score;
                }

                foreach($input['fix_id'] as $key => $id){
                        $predictions[$key]['fixture_id'] = $id;
                        $predictions[$key]['user_id'] = $this->user->id ;
                }

                foreach($predictions as $prediction){
                        $fxt = \App\Fixture::findOrFail($prediction['fixture_id']);
                        if($fxt->isClosed()){ continue; }
                        $pred = \App\Prediction::firstOrNew(['user_id'=>$prediction['user_id'],'fixture_id'=>$prediction['fixture_id']]);

                        $pred->home_score = $prediction['home_score'];
                        $pred->away_score = $prediction['away_score'];

                        if($pred->valid()){
                                $pred->save();
                        }
                }

                return redirect('/');

        }
}
