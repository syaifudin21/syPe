<?php


Route::get('/', 'Dokter\HomeController@index')->name('dokter.home');
Route::get('/login', 'Dokter\LoginController@form');
Route::post('/login', 'Dokter\LoginController@login')->name('dokter.login');
Route::post('/logout', 'Dokter\LoginController@logout')->name('dokter.logout');

Route::get('/profil', 'Dokter\ProfilController@profil')->name('dokter.profil');
Route::put('/profil/update', 'Dokter\ProfilController@profilupdate')->name('dokter.profil.update');
Route::put('/profil/password', 'Dokter\ProfilController@profilupdatepasword')->name('dokter.profil.password');
Route::get('/dokter/status', 'Dokter\ProfilController@status')->name('dokter.dokter.status');

Route::get('/dokter/show/{id}', 'dokter\ProfilController@dokterprofil')->name('dokter.dokter.show');
Route::get('/pasien/show/{id}', 'dokter\ProfilController@pasienprofil')->name('dokter.pasien.show');

Route::get('/diagnosa', 'Dokter\DiagnosaController@index')->name('dokter.diagnosa');
Route::get('/diagnosa/tambah/{periksa_id}', 'Dokter\DiagnosaController@create')->name('dokter.diagnosa.create');
Route::post('/diagnosa/tambah', 'Dokter\DiagnosaController@store')->name('dokter.diagnosa.store');

Route::get('/periksa', 'Dokter\PeriksaController@index')->name('dokter.periksa');
Route::get('/periksa/show/{id}', 'Dokter\PeriksaController@show')->name('dokter.periksa.show');
Route::post('/periksa/tambah/pra', 'Dokter\PeriksaController@storepra')->name('dokter.periksa.store.pra');
Route::post('/periksa/tambah/primer', 'Dokter\PeriksaController@storeprimer')->name('dokter.periksa.store.primer');
Route::delete('/periksa/tambah/akhir', 'Dokter\PeriksaController@storeakhir')->name('dokter.periksa.store.akhir');
