<?php

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin/management')->group(function () {
    Route::namespace('Admin')->group(function () {

        //User Management

        Route::prefix('users')->group(function () {

                Route::get('/', 'UserController@index')->name('admin.user.index');
                Route::get('/create', 'UserController@create')->name('admin.user.create');
                Route::post('/store', 'UserController@store')->name('admin.user.store');
                Route::get('/edit/{employee}', 'UserController@edit')->name('admin.user.edit');
                Route::get('/update/{employee}', 'UserController@update')->name('admin.user.update');
                Route::get('/destroy/{employee}', 'UserController@destroy')->name('admin.user.destroy');

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
