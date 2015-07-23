<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
            $this->composeNavigation();
            $this->composeProfileBox();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeNavigation(){
        view()->composer('partials.nav',function($view){
                    $logged_in = false;

                    if(\Auth::check()){
                            $logged_in = true;
                            $view->with('authUser',\Auth::user());
                    }
                    $view->with('logged_in',$logged_in);
            });
    }

    private function composeProfileBox(){
            view()->composer('partials.profbox',function($view){
                    if(!$view->profUser){
                            $view->with('profUser',\Auth::user());
                    }

            });

    }
}
