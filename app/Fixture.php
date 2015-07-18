<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
        protected $table='fixtures';

        protected $guarded=[];

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



}
