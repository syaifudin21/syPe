<?php


Route::get('/', 'Ownner\HomeController@index')->name('ownner.home');
Route::get('/login', 'Ownner\LoginController@form');
Route::post('/login', 'Ownner\LoginController@login')->name('ownner.login');
Route::post('/logout', 'Ownner\LoginController@logout')->name('ownner.logout');

Route::get('/profil', 'Ownner\ProfilController@profil')->name('ownner.profil');
Route::put('/profil/update', 'Ownner\ProfilController@profilupdate')->name('ownner.profil.update');
Route::put('/profil/password', 'Ownner\ProfilController@profilupdatepasword')->name('ownner.profil.password');
Route::get('/ownner/status', 'Ownner\ProfilController@status')->name('ownner.ownner.status');

Route::get('/outlet', 'Ownner\OwnnerController@index')->name('ownner.outlet');
Route::get('/outlet/show/{id}', 'Ownner\OwnnerController@show')->name('ownner.outlet.show');
Route::post('/outlet/tambah', 'Ownner\OwnnerController@store')->name('ownner.outlet.store');
Route::get('/outlet/edit/{id}', 'Ownner\OwnnerController@edit')->name('ownner.outlet.edit');
Route::post('/outlet/update', 'Ownner\OwnnerController@update')->name('ownner.outlet.store');
Route::delete('/outlet/tambah/akhir', 'Ownner\OwnnerController@storeakhir')->name('ownner.outlet.delete');

Route::get('/produk', 'Ownner\ProdukController@index')->name('ownner.produk');
Route::get('/produk/create', 'Ownner\ProdukController@create')->name('ownner.produk.create');
Route::get('/produk/show/{id}', 'Ownner\ProdukController@show')->name('ownner.produk.show');
Route::post('/produk/tambah', 'Ownner\ProdukController@store')->name('ownner.produk.store');
Route::get('/produk/edit/{id}', 'Ownner\ProdukController@edit')->name('ownner.produk.edit');
Route::put('/produk/update', 'Ownner\ProdukController@update')->name('ownner.produk.update');
Route::delete('/produk/tambah/akhir', 'Ownner\ProdukController@storeakhir')->name('ownner.produk.delete');
