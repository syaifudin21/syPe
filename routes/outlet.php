<?php


Route::get('/', 'Outlet\HomeController@index')->name('outlet.home');
Route::get('/login', 'Outlet\LoginController@form');
Route::post('/login', 'Outlet\LoginController@login')->name('outlet.login');
Route::post('/logout', 'Outlet\LoginController@logout')->name('outlet.logout');

Route::get('/profil', 'Outlet\ProfilController@profil')->name('outlet.profil');
Route::put('/profil/update', 'Outlet\ProfilController@profilupdate')->name('outlet.profil.update');
Route::put('/profil/password', 'Outlet\ProfilController@profilupdatepasword')->name('outlet.profil.password');
Route::get('/outlet/status', 'Outlet\ProfilController@status')->name('outlet.outlet.status');

Route::get('/kasir', 'Outlet\KasirController@index')->name('outlet.kasir');
Route::get('/kasir/create', 'Outlet\KasirController@create')->name('outlet.kasir.create');
Route::get('/kasir/show/{id}', 'Outlet\KasirController@show')->name('outlet.kasir.show');
Route::post('/kasir/tambah', 'Outlet\KasirController@store')->name('outlet.kasir.store');
Route::get('/kasir/edit/{id}', 'Outlet\KasirController@edit')->name('outlet.kasir.edit');
Route::put('/kasir/update', 'Outlet\KasirController@update')->name('outlet.kasir.update');
Route::delete('/kasir/tambah/akhir', 'Outlet\KasirController@storeakhir')->name('outlet.kasir.delete');

Route::get('/produk', 'Outlet\ProdukController@index')->name('outlet.produk');
Route::get('/produk/create', 'Outlet\ProdukController@create')->name('outlet.produk.create');
Route::get('/produk/show/{id}', 'Outlet\ProdukController@show')->name('outlet.produk.show');
Route::post('/produk/tambah', 'Outlet\ProdukController@store')->name('outlet.produk.store');
Route::get('/produk/edit/{id}', 'Outlet\ProdukController@edit')->name('outlet.produk.edit');
Route::put('/produk/update', 'Outlet\ProdukController@update')->name('outlet.produk.update');
Route::delete('/produk/tambah/akhir', 'Outlet\ProdukController@storeakhir')->name('outlet.produk.delete');

Route::get('/stok', 'Outlet\StokController@show')->name('outlet.stok.show');
Route::post('/stok/store', 'Outlet\StokController@store')->name('outlet.produk.stok.store');
