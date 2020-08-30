<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Firebase\JWT\JWT;
use Cookie;

class TokenProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Firebase\JWT\JWT', function(){
            
            $token = Cookie::get('token');
            $key = 'este-es-el-seed-desarrollo';
            return new JWT::decode($token, $key, array('HS256'));
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
