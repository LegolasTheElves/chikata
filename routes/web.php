<?php

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


Route::group(['middleware'=>'web'], function(){
    
    Route::get('/', function () { 
    return view('welcome');
})->name('home');
    
    //route for signup
        Route::post('/signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'signup'
    ]);
     //route for signin
        Route::post('/signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'signin'
    ]);
    //logout route
        Route::get('/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'logout'
    ]);
    
    //route to dashboard view
    Route::get('/dashboard', [
        'uses' => 'PostController@getDashboard',
        'as' => 'dashboard',
        'middleware' => 'auth'
    ]);
    //createpost route
     Route::post('/createpost', [
        'uses' => 'PostController@postCreatePost',
        'as' => 'post.create',
         'middleware' => 'auth'
    ]);
    //deleting post route
     Route::get('/delete-post/{post_id}', [
        'uses' => 'PostController@getDeletePost',
        'as' => 'post.delete',
         'middleware' => 'auth'
    ]);
    Route::post('/edit', function(\Illuminate\Http\Request $request){
        return response()->json(['message' => $request['body']]);
    })->name('edit');
    
 });