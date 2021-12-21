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
    ////////////////user
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::post('/user/order', 'UserController@order')->name('user.order');
    Route::get('/user/ListOrder', 'UserController@listOrder')->name('user.listOrder');
    Route::get('/user/detailOrder/{id}', 'UserController@detailOrder')->name('user.detailOrder');
    Route::get('/user/profile', 'UserController@profile')->name('user.profile');
    Route::post('/user/editProfile', 'UserController@editProfile')->name('user.editProfile');
    Route::post('user/credentials', 'UserController@changePassword')->name('user.changePassword');
    Route::get('/user/success', 'UserController@success')->name('user.success');
    Route::get('/user/wallet', 'UserController@wallet')->name('user.wallet');
    Route::post('/user/recharge', 'UserController@recharge')->name('user.recharge');
    Route::post('/user/withdrawal', 'UserController@withdrawal')->name('user.withdrawal');
    Route::get('not_auth', 'UserController@not_auth')->name('not_auth');
    //home

    //////////////////Admin
    Route::get('/admin', 'AdminController@index')->name('admin.index');
    Route::get('/admin/editAccount', 'AdminController@editAccount')->name('admin.edit_account');
});

Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

