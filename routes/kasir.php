<?php


Route::get('/', 'Kasir\HomeController@index')->name('kasir.home');
Route::get('/login', 'Kasir\LoginController@form');
Route::post('/login', 'Kasir\LoginController@login')->name('kasir.login');
Route::post('/logout', 'Kasir\LoginController@logout')->name('kasir.logout');

Route::get('/profil', 'Kasir\ProfilController@profil')->name('kasir.profil');
Route::put('/profil/update', 'Kasir\ProfilController@profilupdate')->name('kasir.profil.update');
Route::put('/profil/password', 'Kasir\ProfilController@profilupdatepasword')->name('kasir.profil.password');
Route::get('/kasir/status', 'Kasir\ProfilController@status')->name('kasir.kasir.status');

Route::get('/kasir/show/{id}', 'kasir\ProfilController@kasirprofil')->name('kasir.kasir.show');
Route::get('/pasien/show/{id}', 'kasir\ProfilController@pasienprofil')->name('kasir.pasien.show');

Route::get('/diagnosa', 'Kasir\DiagnosaController@index')->name('kasir.diagnosa');
Route::get('/diagnosa/tambah/{periksa_id}', 'Kasir\DiagnosaController@create')->name('kasir.diagnosa.create');
Route::post('/diagnosa/tambah', 'Kasir\DiagnosaController@store')->name('kasir.diagnosa.store');

Route::get('/periksa', 'Kasir\PeriksaController@index')->name('kasir.periksa');
Route::get('/periksa/show/{id}', 'Kasir\PeriksaController@show')->name('kasir.periksa.show');
Route::post('/periksa/tambah/pra', 'Kasir\PeriksaController@storepra')->name('kasir.periksa.store.pra');
Route::post('/periksa/tambah/primer', 'Kasir\PeriksaController@storeprimer')->name('kasir.periksa.store.primer');
Route::delete('/periksa/tambah/akhir', 'Kasir\PeriksaController@storeakhir')->name('kasir.periksa.store.akhir');
