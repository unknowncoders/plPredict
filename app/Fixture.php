<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
        protected $table='fixtures';

        protected $guarded=[];

        /**
         * Kickoff should be a Carbon instance
         *
         *
         */
        protected $dates=["kickoff"];

        public function predictions(){
            return $this->hasMany('App\Prediction');
        }

        public function homeClub(){
                return $this->belongsTo('App\Club','home_club_id');
        }

        public function awayClub(){
                return $this->belongsTo('App\Club','away_club_id');
        }

        public function gameweek(){
                return $this->belongsTo('App\Gameweek','gameweek_id');
        }

        public function scopeOver($query){
                $query->whereNotNull('home_score')->whereNotNull('away_score');
        }

        public function isClosed(){
                //A fixtureis closed 1 hour before kickoff
                return ($this->kickoff < \Carbon\Carbon::now()->addHour(1));
        }

        public function isOver(){
                return (isset($this->home_score) && isset($this->away_score));
        }

        public function prediction($id){
                return $this->predictions()->where('user_id',$id)->first();
        }

}
