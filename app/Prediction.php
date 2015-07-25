<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
        protected $table='predictions';

        protected $guarded=[];

        protected $score=[0,2,5,6,7,10];


        public function user(){
                return $this->belongsTo('App\User');
        }

        public function fixture(){
                return $this->belongsTo('App\Fixture');
        }

        public function isBoosted(){
                return ($this->id == $this->fixture->gameweek->predictors()->where('users.id',$this->user_id)->first()->pivot->boost_pid);
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
}
