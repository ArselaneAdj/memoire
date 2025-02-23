<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Notes;
use App\Models\Post;
use App\Models\StudentEval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            if (Auth::check() && Auth::user()->role === 'enseignant') {
                $counts = StudentEval::count();
                $view->with('counts', $counts);
            }
            if (Auth::check() && Auth::user()->role === 'enseignant') {
                $countet = Category::where('role', 'etudiant')->count();
                $view->with('countet', $countet);
            }
            if (Auth::check() && Auth::user()->role === 'etudiant') {
                $counte = Notes::count();
                $view->with('counte', $counte);
            }
            if (Auth::check() && Auth::user()->role === 'etudiant') {
                $countp = Post::count();
                $view->with('countp', $countp);
            }
        });
    }
}
