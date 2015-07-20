<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
        public function findByUserNameOrCreate($userData,$provider=null)
        {
                $user = User::where('email','=',$userData->email)->first();

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
                                'pic_id'=>'1',
                                'score'=>0,
                        ]);

                }


                return $user;
        }
}





