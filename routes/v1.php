<?php


Route::post('/outlet/login', 'Android\LoginController@outletlogin');
Route::post('/kasir/login', 'Android\LoginController@kasirlogin');

Route::post('/outlet/profil', 'Android\OutletController@profil');

Route::post('/outlet/kasir/data', 'Android\KasirController@kasirdata');
Route::post('/outlet/kasir/store', 'Android\KasirController@kasirstore');
Route::post('/outlet/kasir/update', 'Android\KasirController@kasirupdate');
Route::post('/outlet/kasir/delete', 'Android\KasirController@kasirdelete');