<?php

namespace App\Providers;

use App\Models\Manhwa;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
Use App\Models\Genre;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('genres', \App\Models\Genre::all());

        View::composer('components.layout', function ($view) {
            $view->with('manhwas', Manhwa::select('id', 'title', 'author', 'cover_image')
                ->orderBy('title')
                ->get());
        });
    }
}
