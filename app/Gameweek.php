<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gameweek extends Model
{
        protected $table='gameweeks';

        protected $guarded=[];

        public function fixtures(){
            return $this->hasMany('App\Fixture');
        }

        public function month(){
                return $this->belongsTo('App\Month');
        }

        public function predictors(){
                return $this->belongsToMany('App\User','gameweek_user');
        }
}
