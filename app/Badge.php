<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
        protected $table='badges';

        public function getIconPathAttribute($path){
                    return "badges/".$path;
        }

        public function users(){
                return $this->belongsToMany('App\User','badge_user','badge_id','user_id');
        }

        public function getRawIconPath(){
                return str_replace("badges/","",$this->icon_path);
        }
}
