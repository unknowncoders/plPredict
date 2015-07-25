<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
        public function findByUserNameOrCreate($userData,$provider=null)
        {
                $user = User::where('email','=',$userData->email)->first();

                //TODO Replace randomstr with a real random string
                //

                if(!$user){
                        $user = User::create([
                                'name'=>$userData->name,
                                'email'=>$userData->email,
                                'username'=>null,
                                'password'=>\Hash::make('randomstr'),
                                'status'=>0,
                                'provider'=>$provider,
                                'provider_id'=>$userData->id,
                                'club_id'=>null,
                                'score'=>0,
                                'rank'=>null,
                        ]);

                }


                return $user;
        }
}





