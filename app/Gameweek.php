<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gameweek extends Model
{
        protected $table='gameweeks';

        protected $fillable=['month_id','status'];
}
