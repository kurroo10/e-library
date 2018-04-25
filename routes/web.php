<?php

Route::get('/admin/home', 'HomeController@index')->name('admin.index');
Route::get('/user/home', 'User\UserController@index')->name('user.index');
Route::get('/user/book/{id}', 'User\UserController@show')->name('user.show');
Route::get('/user/book/pdf/{id}', 'User\UserController@pdf')->name('user.pdf');
Route::post('/user/book/find', 'User\UserController@find')->name('user.book.find');

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

        //Class Manageent

        Route::prefix('student')->group(function () {

                Route::get('/{student}', 'StudentController@index')->name('admin.student.index');
                Route::get('/{student}/create', 'StudentController@create')->name('admin.student.create');
                Route::post('/{student}/store', 'StudentController@store')->name('admin.student.store');
                Route::get('/{classes}/edit/{student}', 'StudentController@edit')->name('admin.student.edit');
                Route::put('/{classes}/update/{student}', 'StudentController@update')->name('admin.student.update');
                Route::get('/{classes}/destroy/{student}', 'StudentController@destroy')->name('admin.student.destroy');

        });

        Route::prefix('curriculumn')->group(function () {

                Route::get('/{curriculumn}', 'CurriculumnController@index')->name('admin.curriculumn.index');
                Route::get('/{curriculumn}/create', 'CurriculumnController@create')->name('admin.curriculumn.create');
                Route::post('/{curriculumn}/store', 'CurriculumnController@store')->name('admin.curriculumn.store');
                Route::get('/{classes}/edit/{curriculumn}', 'CurriculumnController@edit')->name('admin.curriculumn.edit');
                Route::put('/{classes}/update/{curriculumn}', 'CurriculumnController@update')->name('admin.curriculumn.update');
                Route::get('/{classes}/destroy/{curriculumn}', 'CurriculumnController@destroy')->name('admin.curriculumn.destroy');

        });

        Route::prefix('book')->group(function () {

                Route::get('/{book}', 'BookController@index')->name('admin.book.index');
                Route::get('/{book}/create', 'BookController@create')->name('admin.book.create');
                Route::post('/{book}/store', 'BookController@store')->name('admin.book.store');
                Route::get('/{classes}/edit/{book}', 'BookController@edit')->name('admin.book.edit');
                Route::put('/{classes}/update/{book}', 'BookController@update')->name('admin.book.update');
                Route::get('/{classes}/destroy/{book}', 'BookController@destroy')->name('admin.book.destroy');
                Route::get('/pdf/{book}', 'BookController@show')->name('file.pdf');

        });


    });
});


Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();
