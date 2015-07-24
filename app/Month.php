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

        public function users(){
                return $this->belongsToMany('App\User','month_user');
        }
}
