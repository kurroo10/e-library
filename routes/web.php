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
                Route::put('/update/{employee}', 'UserController@update')->name('admin.user.update');
                Route::get('/destroy/{employee}', 'UserController@destroy')->name('admin.user.destroy');

        });

        //Class Manageent

        Route::prefix('classes')->group(function () {

                Route::get('/', 'ClassController@index')->name('admin.classes.index');
                Route::get('/create', 'ClassController@create')->name('admin.classes.create');
                Route::post('/store', 'ClassController@store')->name('admin.classes.store');
                Route::get('/edit/{classes}', 'ClassController@edit')->name('admin.classes.edit');
                Route::put('/update/{classes}', 'ClassController@update')->name('admin.classes.update');
                Route::get('/destroy/{classes}', 'ClassController@destroy')->name('admin.classes.destroy');

        });


    });
});


Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();
