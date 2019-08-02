<?php


Route::post('/outlet/login', 'Android\LoginController@outletlogin');
Route::post('/kasir/login', 'Android\LoginController@kasirlogin');

Route::post('/outlet/profil', 'Android\OutletController@profil');

Route::post('/outlet/kasir/data', 'Android\KasirController@kasirdata');
Route::post('/outlet/kasir/store', 'Android\KasirController@kasirstore');
Route::post('/outlet/kasir/update', 'Android\KasirController@kasirupdate');
Route::post('/outlet/kasir/delete', 'Android\KasirController@kasirdelete');

Route::post('/outlet/produk/data', 'Android\ProdukController@produkdata');
Route::post('/outlet/produk/store', 'Android\ProdukController@produkstore');
Route::post('/outlet/produk/update', 'Android\ProdukController@produkupdate');
Route::post('/outlet/produk/delete', 'Android\ProdukController@produkdelete');

Route::post('/outlet/stok/store', 'Android\ProdukController@stokstore');
Route::post('/outlet/stok/data', 'Android\ProdukController@stokdata');
