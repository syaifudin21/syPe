<?php


Route::get('/', 'Outlet\HomeController@index')->name('outlet.home');
Route::get('/login', 'Outlet\LoginController@form');
Route::post('/login', 'Outlet\LoginController@login')->name('outlet.login');
Route::post('/logout', 'Outlet\LoginController@logout')->name('outlet.logout');

Route::get('/profil', 'Outlet\ProfilController@profil')->name('outlet.profil');
Route::put('/profil/update', 'Outlet\ProfilController@profilupdate')->name('outlet.profil.update');
Route::put('/profil/password', 'Outlet\ProfilController@profilupdatepasword')->name('outlet.profil.password');
Route::get('/outlet/status', 'Outlet\ProfilController@status')->name('outlet.outlet.status');

Route::get('/kasir', 'Outlet\kasirController@index')->name('outlet.kasir');
Route::get('/kasir/show/{id}', 'Outlet\kasirController@show')->name('outlet.kasir.show');
Route::post('/kasir/tambah', 'Outlet\kasirController@store')->name('outlet.kasir.store');
Route::get('/kasir/edit/{id}', 'Outlet\kasirController@edit')->name('outlet.kasir.edit');
Route::post('/kasir/update', 'Outlet\kasirController@update')->name('outlet.kasir.store');
Route::delete('/kasir/tambah/akhir', 'Outlet\kasirController@storeakhir')->name('outlet.kasir.delete');
