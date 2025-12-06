<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Menu;
use App\Models\User;
use App\Models\Slider;
use App\Models\Social;
use App\Models\SubMenu;
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
        //sidebar start from here
        view()->composer('frontend.layouts.sidebar', function ($view) {
            $view->with('user',User::first());
            $view->with('social',Social::first());
        });

        // navbar start from here 
        view()->composer('frontend.layouts.navbar', function ($view) {
            $menus = Menu::all();
            $submenus = SubMenu::all();
            $view->with(compact('menus','submenus'));
        });

        // slider/carouse start from here 
        view()->composer('frontend.layouts.index', function ($view) {
            $view->with('sliders',Slider::all());
        });

        // blog start from here 
        view()->composer('frontend.layouts.index', function ($view) {
            $globalBlogs = Blog::where('status','published')->orderBy('id','desc')->limit(3)->get();
            $view->with(compact('globalBlogs'));
        });

    }
}
