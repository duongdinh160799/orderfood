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
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('admin/', function () {
    return view('welcome');
});
Route::get('user/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('intro.index');
})->name('intro_home');
Route::get('/food', function () {
    return view('intro.food');
});
Route::get('/about', function () {
    return view('intro.about');
});
Route::get('/blog', function () {
    return view('intro.blog');
});
Route::get('/blog-detail', function () {
    return view('intro.blog_detail');
});
Route::get('/location', function () {
    return view('intro.location');
});
Route::get('/menu', function () {
    return view('intro.menu');
});
Route::get('/faq', function () {
    return view('intro.faq');
});
Route::get('/gallery', function () {
    return view('intro.gallery');
});

Auth::routes(['verify' => true]);
Route::middleware('verified')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

