<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
        protected $table='predictions';

        protected $guarded=[];

        public function user(){
                return $this->belongsTo('App\User');
        }

        public function fixture(){
                return $this->belongsTo('App\Fixture');
        }
}
