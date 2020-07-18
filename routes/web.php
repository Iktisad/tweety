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

Route::post('/likes/{tweet}/tweet-like','LikesController@store')->name('tweet.like');
Route::patch('/likes/{tweet}/tweet-dislike','LikesController@update')->name('tweet.dislike');

Route::post('/likes/{comment}/comment-like','LikesController@commentStore')->name('comment.like');
Route::patch('/likes/{comment}/comment-dislike','LikesController@commentUpdate')->name('comment.dislike');


Route::post('/comments/{tweet}/comment', 'CommentsController@store')->name('comment');
Route::patch('/comment/{comment}/update', 'CommentsController@update')->name('comment.update');

// Route::post('/comments/{comment}/reply', 'CommentsController@storeReply')->name('comment-reply');
// Route::patch('/comments/{comment}/updateReply', 'CommentsController@updateReply')->name('comment-reply.update');

Route::post('/likes/{retweet}/retweet-like','LikesController@retweetStore')->name('retweet.like');
Route::patch('/likes/{retweet}/retweet-dislike','LikesController@retweetUpdate')->name('retweet.dislike');

Route::post('/retweets/{retweet}/store','RetweetsController@store')->name('retweet');
Route::post('/retweets/{retweet}/retweet-store','RetweetsController@retweetStore')->name('retweet.store');

Route::post('/comments/{retweet}/retweet-comment','CommentsController@retweetCommentStore')->name('retweet.comment');

});

Route::get('/profiles/{user:username}','ProfilesController@show')->name('profile');
