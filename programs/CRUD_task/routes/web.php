<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/view', [ProductController::class, 'index'])->name('index');

Route::post('/view', [ProductController::class, 'create'])->name('create');

Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');

Route::put('/edit/{id}', [ProductController::class, 'update'])->name('update');

Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');

//Route::get('/view', [ProductController::class, 'store'])->name('store');

// Route::get('/edit', [StudentController::class, 'store'])->name('store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
