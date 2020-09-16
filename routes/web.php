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

Route::get('/about', function () {

    return view('about', [
        'articles'=>App\Article::take(3)->latest()->get()
    ]);
});


Route::get('/articles', 'ArticlesController@index')->name('articles.index');    // this reads a collection of articles
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');       //this reads a single article
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::PUT('/articles/{article}', 'ArticlesController@update');



Route::get('/contact', function () {
    return view('contact');
});
