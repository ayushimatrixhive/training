<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/listing', [ProductController::class, 'show'])->name('show');

Route::get('/product', [ProductController::class, 'index'])->name('index');

Route::post('/product', [ProductController::class, 'create'])->name('create');

Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');

Route::put('/edit/{id}', [ProductController::class, 'update'])->name('update');

Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy');

Route::post('/edit/{id}', [ProductController::class, 'store'])->name('store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');