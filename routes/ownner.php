<?php


Route::get('/', 'Ownner\HomeController@index')->name('ownner.home');
Route::get('/login', 'Ownner\LoginController@form');
Route::post('/login', 'Ownner\LoginController@login')->name('ownner.login');
Route::post('/logout', 'Ownner\LoginController@logout')->name('ownner.logout');

Route::get('/profil', 'Ownner\ProfilController@profil')->name('ownner.profil');
Route::put('/profil/update', 'Ownner\ProfilController@profilupdate')->name('ownner.profil.update');
Route::put('/profil/password', 'Ownner\ProfilController@profilupdatepasword')->name('ownner.profil.password');
Route::get('/ownner/status', 'Ownner\ProfilController@status')->name('ownner.ownner.status');

Route::get('/outlet', 'Ownner\OutletController@index')->name('ownner.outlet');
Route::get('/outlet/show/{id}', 'Ownner\OutletController@show')->name('ownner.outlet.show');
Route::post('/outlet/tambah', 'Ownner\OutletController@store')->name('ownner.outlet.store');
Route::get('/outlet/edit/{id}', 'Ownner\OutletController@edit')->name('ownner.outlet.edit');
Route::post('/outlet/update', 'Ownner\OutletController@update')->name('ownner.outlet.store');
Route::delete('/outlet/tambah/akhir', 'Ownner\OutletController@storeakhir')->name('ownner.outlet.delete');
