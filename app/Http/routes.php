<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function(){
    return view('admin.index');
});

//Route::get('/checkadmin', function(){
//    $user = User::findOrFail(13);
//    //return $user->role->name;
//    if($user->role->name == 'administrator') {
//        return 'This is admin';
//    }
//    return 'no admin';
//});

Route::group(['middleware' => 'admin'], function(){
    Route::resource('admin/users', 'AdminUsersController');
});


