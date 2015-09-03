<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
        public function findByUserNameOrCreate($userData,$provider=null)
        {

                if(empty($userData->email)){
                        $userData->email = 'fb'.$userData->id.'@facebook.com';
                }

                $user = User::where('email','=',$userData->email)->first();

                $randomString = str_random(40);

                if(!$user){
                        $user = User::create([
                                'name'=>$userData->name,
                                'email'=>$userData->email,
                                'username'=>null,
                                'password'=>\Hash::make($randomString),
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





