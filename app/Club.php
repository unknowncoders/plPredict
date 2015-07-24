<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
        protected $table='clubs';

        protected $fillable=['name','pic_id'];

        public function supporters(){
                return $this->hasMany('App\User');
        }

        public function homeFixtures(){
            return $this->hasMany('App\Fixture','home_club_id');
        }

        public function awayFixtures(){
            return $this->hasMany('App\Fixture','away_club_id');
        }

        public function pic(){
                return $this->belongsTo('App\Pic','logo_id');
        }

        public function fanPic(){
                return $this->belongsTo('App\Pic','fan_pic_id');
        }
}
