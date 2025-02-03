<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SearchController;
use App\Models\Category;
use App\Models\Post;

Route::get('/', function () {
    return view('auth.login');
});



    Route::middleware('auth')->group(function () {
        Route::get('/search', [SearchController::class, 'index'])->name('search');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/dashboard', function () {
            $count = Category::count()+1;
            $countco = Post::count();
            $lastMonthCount = Category::whereMonth('created_at', now()->subMonth()->month)->count() + 1;
            // Calculate percentage change
            $percentage = $lastMonthCount ? round((($count - $lastMonthCount) / $lastMonthCount) * 100, 2) : 0;

            $lastMonthPost = Post::whereMonth('created_at', now()->subMonth()->month)->count() ;
            // Calculate percentage change
            $diff = abs($lastMonthPost - $countco);
            return view('dashboard',compact('count','countco','percentage','diff'));
        })->name('dashboard');

    Route::middleware('is_admin')->group(function () { 
        Route::post('/file-upload', [FileController::class, 'upload'])->name('file.upload');
        Route::resource('statistics', \App\Http\Controllers\StatisticController::class);





    });

    Route::middleware('is_aden')->group(function () { 
        Route::resource('categories', \App\Http\Controllers\CategoryController::class); 
        Route::resource('posts', \App\Http\Controllers\PostController::class);
        Route::resource('notes', \App\Http\Controllers\NotesController::class);


    });
        


    Route::middleware('is_adEns')->group(function () { 
        Route::resource('etudiants', \App\Http\Controllers\EtudiantsController::class);
        Route::put('/etudiants/{etudiant}', [\App\Http\Controllers\EtudiantsController::class, 'update'])->name('etudiants.update');
        Route::resource('evalen', \App\Http\Controllers\EvalenController::class);



    });
    Route::middleware('is_etd')->group(function () { 
        Route::resource('cours', \App\Http\Controllers\CoursController::class);
        Route::resource('evalet', \App\Http\Controllers\EvaletController::class);
        Route::resource('enroll', \App\Http\Controllers\EnrollController::class);




    });
});


require __DIR__.'/auth.php';
