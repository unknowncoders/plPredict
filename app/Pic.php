<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
        protected $table='pics';

        protected $guarded=[];

        public function users(){

                return $this->hasMany('App\User');

        }
}
