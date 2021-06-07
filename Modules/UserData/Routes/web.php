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

use Modules\UserData\Entities\User;

Route::prefix('userdata')->group(function() {
    Route::get('/user', 'UserController@index')->name('alluser');
    Route::get('/destroy/{id}', 'UserController@destroy')->name('deleteuser');
    Route::get('/edit/{id}', 'UserController@edit')->name('edituser');
    Route::get('/update/{id}', 'UserController@update')->name('updateuser');
    Route::get('/adduserform', 'UserController@create')->name('userform');
    Route::post('/adduser', 'UserController@store')->name('adduser');
});

Route::prefix('api')->group(function() {
    Route::get('alluser',function (){
        $user =  User::all();
        return json_encode($user);
    });
    Route::get('deleteuser/{id}',function ($id){
        $user =  User::find($id)->first();
        $user->delete();
        $alluser = User::all();
        return json_encode(['user data'=>$alluser,'msg'=>"deleted"]);
    });
});