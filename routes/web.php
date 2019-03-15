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
Route::get('user/posts/ShowAllPosts','Controller@ShowAllPosts')->name('userAllPost');
Route::get('user/posts/like/{id}','Controller@like_post')->name('post.like');
Route::get('user/posts/blog/{slug}', ['uses' => 'PageController@get_single','as' => 'blog.single'])->where('slug', '[\w\d\-\_]+');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@userlogout')->name('user.logout');
Route::get('/user/home',function () {
    return view('user_views.pages.welcome');
});


Route::get('/user/myposts','user_posts_controller@index');


Route::resource('user/posts','user_posts_controller')->middleware('auth');
Route::resource('categories','CategoryController',['except'=>'create'])->middleware('auth');
Route::resource('tags','TagController',['except'=>'create'])->middleware('auth');


//comments
Route::post('comments/{post_id}',['uses' => 'commentsController@store' , 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'commentsController@edit'  , 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'commentsController@update' , 'as' => 'comments.update']);
Route::get('comments/{id}/delete', ['uses' => 'commentsController@delete' , 'as' => 'comments.delete']);
Route::delete('comments/{id}', ['uses' => 'commentsController@destroy' , 'as' => 'comments.destroy']);















Route::prefix("/admin")->group(function ()
{
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/login', 'Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashpoard');
});

