<?php

namespace App\Providers;

use App\Models\Activities;
use App\Models\Erasmus;
use App\Models\Projekti;
use App\Models\Prvacinja;
use App\Models\Takmicenja;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        View::composer('frontend_views.layout.layout', function ($view) {
            $erasmus = Erasmus::select('name', 'slug')->get();
            $competitions = Takmicenja::distinct()->pluck('year')->toArray();
            $prvacinjaUniqueYears = Prvacinja::distinct()->pluck('year')->toArray(); 
            $activities = Activities::distinct()->pluck('year')->toArray();
            $projects = Projekti::distinct()->pluck('year')->toArray();
            $view->with([
                'erasmus' => $erasmus,
                'competitions' => $competitions,
                'prvacinjaUniqueYears' => $prvacinjaUniqueYears,
                'activities' => $activities,
                'projects' => $projects,
            ]);

        });
        Paginator::useBootstrap();
    }
}
