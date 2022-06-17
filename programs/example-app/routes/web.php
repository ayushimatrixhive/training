<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/index', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/courses', function () {
    return view('courses');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/breadcrumb', function () {
    return view('breadcrumb');
});

Route::get('/middle', function () {
    return view('middle');
});
Route::get('/javascript', function () {
    return view('javascript');
});
Route::get('/footer', function () {
    return view('footer');
});

Route::get('/layouts/appmain', function () {
    return view('layouts.appmain');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
