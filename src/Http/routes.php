<?php
/**
 * Created by PhpStorm.
 * User:    vadiasov.volodymyr@gmail.com
 * Project: pack.com
 * Date:    16.02.18
 * Time:    2:46
 */


// src/Http/routes.php

Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('admin/users', 'Vadiasov\UsersAdmin\Http\UsersController@index')->name('admin/users');
    Route::get('admin/users/create', 'Vadiasov\UsersAdmin\Http\UsersController@create')->name('admin/users/create');
    Route::post('admin/users/create', 'Vadiasov\UsersAdmin\Http\UsersController@store');
    Route::get('admin/users/{id}/edit', 'Vadiasov\UsersAdmin\Http\UsersController@edit');
    Route::post('admin/users/{id}/edit', 'Vadiasov\UsersAdmin\Http\UsersController@update');
    Route::get('admin/users/{id}/delete', 'Vadiasov\UsersAdmin\Http\UsersController@destroy');
    
    Route::get('admin/get-user', 'Vadiasov\UsersAdmin\Http\UsersController@showUser');
});

