<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
        protected $table='predictions';

        protected $guarded=[];

        protected $score=[0,2, 5, 6, 7,10,
                          0,4,10,12,14,20]; //Boosted points


        public function user(){
                return $this->belongsTo('App\User');
        }

        public function fixture(){
                return $this->belongsTo('App\Fixture');
        }

        public function isBoosted(){
                return ($this->id == $this->fixture->gameweek->predictors()->where('users.id',$this->user_id)->first()->pivot->boost_id);
        }

        public function score(){
                if(isset($this->grade)){
                    return $this->score[$this->grade];
                }

                return 0;
        }

        public function valid(){
                    if((0<= $this->away_score && $this->away_score <=9) && (0<= $this->away_score && $this->away_score <=9))
                            return true;

                    return false;
        }

        public function grading($fixture){

                    if(( $this->home_score == $fixture->home_score ) and ( $this->away_score == $fixture->away_score )){
                        //Completely correct !!
                            return 5;
                    }
                    elseif( $fixture->home_score == $fixture->away_score){
                            if($this->home_score == $this->away_score){
                                //Correctly predicted draw
                                    return 3;
                            }
                            // Wrong result
                            return 1;
                    }
                    elseif( ($this->home_score - $this->away_score) == ($fixture->home_score - $fixture->away_score)){
                        // Goal difference correct
                            return 4;
                    }elseif((($fixture->home_score > $fixture->away_score) and ($this->home_score > $this->away_score))
                            or (($fixture->home_score < $fixture->away_score) and ($this->home_score < $this->away_score))){
                            // Correct Result
                                    return 2;
                    }else{
                            return 1;
                    }
        }


}
