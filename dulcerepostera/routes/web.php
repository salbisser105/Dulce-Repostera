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

Route::group(['middleware' => 'language'], function () {

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/home', 'HomeController@index')->name('home.index');
Auth::routes();

Route::get('/language/{lang}', 'LanguageController@setLanguage')->name("language.setLanguage");

Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
Route::get('/product/create', 'ProductController@create')->name("product.create");
Route::post('/product/save', 'ProductController@save')->name("product.save");
Route::get('/product/list', 'ProductController@list')->name("product.list");
Route::get('/product/list/{rating}', 'ProductController@list_rating')->name("product.list_rating");
Route::post('/product/delete/{id}', 'ProductController@delete')->name("product.delete");

Route::post('/productcomment/delete/{id}', 'ProductCommentController@delete')->name("productcomment.delete");
Route::post('/productcomment/save', 'ProductCommentController@save')->name("productcomment.save");

Route::post('/postcomment/delete/{id}', 'PostCommentController@delete')->name("postcomment.delete");
Route::post('/postcomment/save', 'PostCommentController@save')->name("postcomment.save");

Route::get('/post/show', 'PostController@show')->name("post.show");
Route::get('/post/create', 'PostController@create')->name("post.create");
Route::post('/post/save', 'PostController@save')->name("post.save");
Route::get('/post/showpost/{id}', 'PostController@showpost')->name("post.showpost");
Route::post('/post/delete/{id}', 'PostController@delete')->name("post.delete");


Route::post('/products/add-to-cart/{id}', 'ProductController@addToCart')->name("product.addToCart");
Route::get('/cart/remove', 'ProductController@removeCart')->name("product.removeCart");
Route::get('/cart/cart', 'ProductController@cart')->name("product.cart");
Route::post('/cart/buy', 'ProductController@buy')->name("product.buy");

Route::post('/wishlist/save/{id}', 'WishListController@save')->name("wishlist.save");
Route::get('/wishlist/show', 'WishListController@list')->name("wishlist.show");
Route::post('/wishlist/delete/{id}', 'WishListController@delete')->name("wishlist.delete");

Route::post('/favposts/save/{id}', 'FavPostsController@save')->name("favposts.save");
Route::get('/favposts/show', 'FavPostsController@list')->name("favposts.show");
Route::post('/favposts/delete/{id}', 'FavPostsController@delete')->name("favposts.delete");

Route::get('pdfview',array('as'=>'pdfview','uses'=>'BestInterviewQuestionController@pdfview'));


});

