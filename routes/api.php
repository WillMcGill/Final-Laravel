<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', 'AuthenticationController@login')->name('login');

Route::post('/register' , 'AuthenticationController@register')->name('register');

Route::get('/active', 'RoutesController@index')->name('active');
Route::get('/show' , 'RoutesController@show')->name('show');
Route::get('/active/{id}', 'RoutesController@showOne')->name('showOne');

Route::get('/comments/{route_id}', 'UsersRoutesController@comments')->name('comments');
Route::get('/currentuser' , 'UserController@currentUser')->name('currentUser');

Route::middleware('auth:api')->group(function(){ 
    Route::get('/logout', 'AuthenticationController@logout')->name('logout');
    
    
}) ;
    
    

