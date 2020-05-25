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

Auth::routes();
Route::middleware('auth')->group(function(){
Route::get('/tweets','TweetsController@index')->name('home');
Route::post('/tweets','TweetsController@store');
Route::post('/profiles/{user:username}/follow','FollowsController@store')->name('follow.store');
Route::get('/profiles/{user:username}/edit','ProfilesController@edit')->name('profile.edit')->middleware('can:edit,user');
Route::patch('/profiles/{user:username}/update','ProfilesController@update')->name('profile.update')->middleware('can:edit,user');
Route::get('/explore','ExploreController@index')->name('explore');

Route::post('/likes/{tweet}/like','LikesController@store')->name('like');
Route::patch('/likes/{tweet}/dislike','LikesController@update')->name('dislike');

});

Route::get('/profiles/{user:username}','ProfilesController@show')->name('profile');
