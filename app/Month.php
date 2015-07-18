<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
        protected $table='months';

        protected $guarded=[];

        public function gameweeks(){
            return $this->hasMany('App\Gameweek');
        }

        public function winner(){
                return $this->belongsTo('App\User','winner_user_id');
        }
}
