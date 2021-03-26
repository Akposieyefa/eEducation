<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function ()  {
            $userRoles = auth()->user()->roles->pluck('name');
                if($userRoles[0] == 'Admin'){
                    return true;
                }
        });

        Blade::if('teacher', function ()  {
           $userRoles = auth()->user()->roles->pluck('name');
           if($userRoles[0] == 'Teacher'){
               return true;
           }
        });

        Blade::if('guardian', function ()  {
            $userRoles = auth()->user()->roles->pluck('name');
            if($userRoles[0] == 'Guardian'){
                return true;
            }
        });

        Blade::if('student', function ()  {
            $userRoles = auth()->user()->roles->pluck('name');
            if($userRoles[0] == 'Student'){
                return true;
            }
        });
    }
}
