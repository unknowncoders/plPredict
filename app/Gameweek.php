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
                return $this->belongsToMany('App\User','gameweek_user')->withPivot('boost_pid','score','rank');
        }

        public function scopeIncomplete($query){
                    $query->where('complete',false);
        }

        public function scopeComplete($query){
                    $query->where('complete',true);
        }

        public function predictions(){
                return $this->hasManyThrough('App\Prediction','App\Fixture');
        }

        public function started(){
                $fixtures = $this->fixtures()->get()->filter(function ($fxt) { return $fxt->isClosed(); });

                if($fixtures->count()!=0){
                        return true;
                }

                return false;
                
        }

        public function hasCompletedFixture(){
                if( $this->fixtures()->over()->count()!=0){
                        return true;
                }
                return false;
        }
}
