<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Requests\Request;

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
            $this->composeAdminVerticalNav();
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
                    $onLogin = false;


                    if(\Auth::check()){
                            $logged_in = true;
                                $view->with('authUser',\Auth::user());
                    }

                    if(isset($view->onLoginPage)){
                            $onLogin = true;
                    }

                    if(!isset($view->nameOfPage)){
                            $view->with('nameOfPage','unknown');
                    }

                    $view->with('logged_in',$logged_in)->with('onLogin',$onLogin);
            });
    }

    private function composeProfileBox(){
            view()->composer('partials.profbox',function($view){
                    
                    if(!isset($view->user)){
                            $view->with('user',\Auth::user());
                    }

            });

    }

    private function composeAdminVerticalNav(){

            view()->composer('admin.partials.vertical_nav',function($view){

                    

            });

    }
}
