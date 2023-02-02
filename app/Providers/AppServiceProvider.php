<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\SidebarController;
use Illuminate\Support\Facades\URL;


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
        Paginator::useBootstrap();

         view()->composer('*', function ($view) 
        {
            if (session()->has('Emp_session')){
            $data = new SidebarController();
            $result = $data->userSidebar();
            //dd($result['rights']);
            $view->with('sidbar', $result); 
        }
        });
    
    }
}
