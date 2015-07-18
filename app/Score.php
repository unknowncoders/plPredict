<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
        protected $table='scores';

        protected $fillable=['val','user_id','gameweek_id'];
}
