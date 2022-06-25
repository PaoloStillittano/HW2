<?php

use Illuminate\Support\Facades\Route;
use App\Models\Review;

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

Route::get('/signup', "App\Http\Controllers\LoginController@signup_form");
Route::post('/signup', "App\Http\Controllers\LoginController@do_signup");

Route::get('/login', "App\Http\Controllers\LoginController@login_form");
Route::post('/login', "App\Http\Controllers\LoginController@do_login");

Route::get('/logout', "App\Http\Controllers\LoginController@logout");

Route::get('home', "App\Http\Controllers\PostController@home");
Route::get('Post/list', "App\Http\Controllers\PostController@list");

Route::get('Post/list/liked/{post}', "App\Http\Controllers\PostController@like");
Route::get('Post/list/unliked/{post}', "App\Http\Controllers\PostController@unlike");

Route::get('search', "App\Http\Controllers\SpotifyController@search");
Route::get('search/search_song', "App\Http\Controllers\SpotifyController@search_song");

Route::get('recensioni', "App\Http\Controllers\ReviewController@show");
Route::get('recensioni/load', "App\Http\Controllers\ReviewController@LoadReviews");
Route::post('recensioni/create', "App\Http\Controllers\ReviewController@store");



