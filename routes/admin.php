<?php


Route::get('/', 'Admin\HomeController@index')->name('admin.home');
Route::get('/login', 'Admin\LoginController@form');
Route::post('/login', 'Admin\LoginController@login')->name('admin.login');
Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');

Route::get('/outlet', 'Admin\OutletController@index')->name('admin.outlet');
Route::get('/outlet/create', 'Admin\OutletController@create')->name('admin.outlet.create');
Route::get('/outlet/show/{id}', 'Admin\OutletController@show')->name('admin.outlet.show');
Route::post('/outlet/tambah', 'Admin\OutletController@store')->name('admin.outlet.store');
Route::get('/outlet/edit/{id}', 'Admin\OutletController@edit')->name('admin.outlet.edit');
Route::put('/outlet/update', 'Admin\OutletController@update')->name('admin.outlet.update');
Route::delete('/outlet/tambah/akhir', 'Admin\OutletController@storeakhir')->name('admin.outlet.delete');

Route::get('/ownner', 'Admin\OwnnerController@index')->name('admin.ownner');
Route::get('/ownner/create', 'Admin\OwnnerController@create')->name('admin.ownner.create');
Route::get('/ownner/show/{id}', 'Admin\OwnnerController@show')->name('admin.ownner.show');
Route::post('/ownner/tambah', 'Admin\OwnnerController@store')->name('admin.ownner.store');
Route::get('/ownner/edit/{id}', 'Admin\OwnnerController@edit')->name('admin.ownner.edit');
Route::put('/ownner/update', 'Admin\OwnnerController@update')->name('admin.ownner.update');
Route::delete('/ownner/tambah/akhir', 'Admin\OwnnerController@storeakhir')->name('admin.ownner.delete');
