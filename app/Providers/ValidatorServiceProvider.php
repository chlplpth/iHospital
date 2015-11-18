<?php

namespace App\Providers;

use Auth;
use Validator;
use Illuminate\Support\ServiceProvider;

// model
use App\User;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend('kam', function($attribute, $value, $parameters){
            return $value == "kamkam";
        });

        $this->app['validator']->extend('matchUsername', function($attribute, $value, $parameters){
            if(sizeof($parameters) > 0)
            {
                return Auth::attempt(['username' => $parameters[0], 'password' => $value]);
            }
            else
            {
                return 0;
            }
        });
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
}
