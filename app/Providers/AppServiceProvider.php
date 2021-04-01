<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Illuminate\Support\Facades\View;

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
        $category = Category::where('sub', 0)
        ->where('is_active', 1)
        ->orderBy('id', 'ASC')
        ->get();
        $sub = Category::where('sub', '>',0)
        ->where('is_active', 1)
        ->orderBy('id', 'ASC')
        ->get();

        

        View::share('master_category',[$category,$sub]);
    }
}
