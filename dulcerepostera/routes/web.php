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

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/admin/index', 'Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
Route::get('/product/create', 'ProductController@create')->name("product.create");
Route::post('/product/save', 'ProductController@save')->name("product.save");
Route::get('/product/list', 'ProductController@list')->name("product.list");
Route::post('/product/delete/{id}', 'ProductController@delete')->name("product.delete");
Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/post/show', 'PostController@show')->name("post.show");
Route::get('/post/create', 'PostController@create')->name("post.create");
Route::post('/post/save', 'PostController@save')->name("post.save");
Route::get('/post/showpost/{id}', 'PostController@showpost')->name("post.showpost");
Route::post('/post/delete/{id}', 'PostController@delete')->name("post.delete");

Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
