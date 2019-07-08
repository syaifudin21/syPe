<?php


Route::post('/outlet/login', 'Android\LoginController@outletlogin');
Route::post('/kasir/login', 'Android\LoginController@kasirlogin');

Route::post('/outlet/profil', 'Android\OutletController@profil');