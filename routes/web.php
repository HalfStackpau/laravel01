<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Rutes principals
Route::get('/',[HomeController::class,'index'])->name('home');

Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
    'comments'=>'CommentController'
]);
Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/post','PostController@index')->name('post');

Route::put('/updatepassword','ProfileController@updatePassword')->name('updatepassword');
//Route::get('/posts','PostController@index')->name('posts');
Route::get('/admin','ProfileController@admin')->name('admin')->middleware(['auth','role:admin']);

Auth::routes();




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
