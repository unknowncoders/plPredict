<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //TODO- set this fillable property
    //protected $fillable = ['name', 'email', 'password'];
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function club(){
            return $this->belongsTo('App\Club');
    }

    public function predictions(){
            return $this->hasMany('App\Prediction');
    }

    public function badges(){
            return $this->belongsToMany('App\Badge','badge_user','user_id','badge_id');
    }

    public function gameweeks(){
            return $this->belongsToMany('App\Gameweek','gameweek_user')->withPivot('score','rank');
    }

    public function months(){
            return $this->belongsToMany('App\Month','month_user');
    }

}
