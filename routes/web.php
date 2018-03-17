<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin/management')->group(function () {
    Route::namespace('Admin')->group(function () {

        //User Management

        Route::prefix('users')->group(function () {

                Route::get('/', 'UserController@index');
                
        });

        //Class Manageent

        Route::prefix('classes')->group(function () {

                Route::get('/', 'ClassController@index')->name('admin.classes.index');
                
        });


    });
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
