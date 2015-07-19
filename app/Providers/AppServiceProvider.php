<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
            view()->composer('partials.nav',function($view){
                    $logged_in = false;

                    if(\Auth::check()){
                            $logged_in = true;
                            $view->with('user',\Auth::user());
                    }
                    $view->with('logged_in',$logged_in);
            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
