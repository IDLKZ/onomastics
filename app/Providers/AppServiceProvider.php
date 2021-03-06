<?php

namespace App\Providers;

use App;
use App\Footer;
use App\Language;
use App\Social;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::if('admin', function (){
            return Auth::user()->role_id == 1 ? true : false;
        });
        Blade::if('editor', function (){
            return Auth::user()->role_id == 2 ? true : false;
        });

        \view()->composer("layouts.frontend.footer",function ($view){
            $footer = Footer::where("language_id",Language::getLanguage())->first();
            $view->with("footer",$footer);
        });
        \view()->composer("layouts.frontend.footer",function ($view){
            $socials = Social::all();
            $view->with("socials",$socials);
        });
        \view()->composer("layouts.frontend.footer",function ($view){
           $emails = App\Email::all();
            $view->with("emails",$emails);
        });
        Paginator::useBootstrap();
    }
}
