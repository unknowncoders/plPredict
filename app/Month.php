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

        public function fixtures(){
                return $this->hasManyThrough('App\Fixture','App\Gameweek');
        }

        public function hasCompletedGameweek(){

                if($this->gameweeks()->complete()->count() != 0){
                        return true;
                }

                return false;
        }

        public function hasStarted(){

                if($this->fixtures()->over()->count()!=0){
                        return true;
                }

                return false;
        }
}
