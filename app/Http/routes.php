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

//Route::get('/userstest', function(){
//    //$users = new User;
//    $user = User::find(2);
//    echo $user->role->id . ' ' . $user->role->name;
    //dd($users);
    //dd($users->all());
    //echo $users->find(1);
//    foreach ($users as $user) {
//        echo $user->name;
//    }
//});

//Route::get('/roles', function(){
//    $roles = new Role;
//    $roles = $roles->all();
//    foreach ($roles as $role) {
//        echo $role->id . ' ' . $role->name .'<br>';
//    }
//});


//Route::get('/findme', function(){
//    $user = new User;
//    echo "<pre>";
//    var_dump($user);
//});

Route::resource('admin/users', 'AdminUsersController');

