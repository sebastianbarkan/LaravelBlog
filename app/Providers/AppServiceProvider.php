<?php

namespace App\Providers;

use App\Models\Community;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades;
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
        //
        Facades\View::composer('components.standard_layout', function (View $view) {
            $view->with('communities', Community::query()->latest()->get());
        });
    }

  
}
