<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


Route::get('/', function () {
    return view('welcome');
});



    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    

    Route::middleware('is_admin')->group(function () { 
        Route::post('/file-upload', [FileController::class, 'upload'])->name('file.upload');
        Route::resource('statistics', \App\Http\Controllers\StatisticController::class);





    });

    Route::middleware('is_aden')->group(function () { 
        Route::resource('categories', \App\Http\Controllers\CategoryController::class); 
        Route::resource('posts', \App\Http\Controllers\PostController::class);


    });
        


    Route::middleware('is_adEns')->group(function () { 
        Route::resource('etudiants', \App\Http\Controllers\EtudiantsController::class);
        Route::resource('evalen', \App\Http\Controllers\EvalenController::class);



    });
    Route::middleware('is_etd')->group(function () { 
        Route::resource('cours', \App\Http\Controllers\CoursController::class);
        Route::resource('evalet', \App\Http\Controllers\EvaletController::class);
        Route::resource('notes', \App\Http\Controllers\NotesController::class);




    });
});


require __DIR__.'/auth.php';
