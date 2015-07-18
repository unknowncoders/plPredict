<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
        protected $table='scores';

        protected $guarded=[];

        public function user(){
                return $this->belongsTo('App\User');
        }

        public function gameweek(){
                return $this->belongsTo('App\Gameweek');
        }
}
