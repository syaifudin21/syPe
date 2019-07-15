<?php

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasir;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
	public function kasirdata(Request $request)
	{
		$outlet = Kasir::where('outlet_id', $request->outlet_id)->first();
		if ($outlet) {
			$kasirs = Kasir::where('outlet_id', $outlet->id)->get();
        	$data = [
				'kasir' => $kasirs,
	    		'message' =>'Data Kasir berhasil dimuat',
	    		'kode' => '00'
	    	];
        } else {
			$data = [
	    		'message' =>'Nomor Outlet Tidak Ada',
	    		'kode' => '01'
	    	];
		}
		return $data;

	}
    public function kasirstore(Request $request)
    {
        $chek = Kasir::where('username', $request->username)->first();
        if (!empty($chek)) {
        	$data = [
	    		'message' =>'Username Sudah dipakai',
	    		'kode' => '03'
	    	];
        } else {
	        $kasir = new Kasir();
			$kasir->fill($request->all());
	        $kasir['password'] = Hash::make($request['password']);
	        $kasir->save();

	        if (!empty($kasir)) {
	    		$data = [
		    		'profil' => $kasir,
		    		'message' =>'Berhasil Menambah User Kasir',
		    		'kode' => '00'
		    	];
	    	}else{
	    		$data = [
		    		'message' =>'Gagal Menambahakan User Kasir',
		    		'kode' => '01'
		    	];
	    	}
        }
    	
    	return $data;
    }
    
    public function kasirprofil(Request $request)
    {
    	$profil = Kasir::find($request->kasir_id);
    	if (!empty($profil)) {
    		$data = [
	    		'profil' => $profil,
	    		'message' =>'Data diketemukan',
	    		'kode' => '00'
	    	];
    	}else{
    		$data = [
	    		'message' =>'Data tidak diketemukan',
	    		'kode' => '01'
	    	];
    	}
    	
    	return $data;
    }

    public function kasirupdate(Request $request)
    {
    	$kasir = Kasir::find($request->kasir_id);
    	if (!empty($kasir)) {
    		$kasir->fill($request->all());
	        $kasir->update();
	        $data = [
	        	'kasir' => $kasir,
	    		'message' =>'Berhasil Update Profil Kasir',
	    		'kode' => '00'
	    	];
    	} else {
    		$data = [
	    		'message' =>'ID Kasir tidak terdaftar',
	    		'kode' => '01'
	    	];
    	}
    	return $data;
	}
	public function kasirdelete(Request $request)
	{
		$kasir = Kasir::find($request->kasir_id);
    	if (!empty($kasir)) {
	        $kasir->delete();
	        $data = [
	    		'message' =>'Kasir Berhasil dihapus',
	    		'kode' => '00'
	    	];
    	} else {
    		$data = [
	    		'message' =>'Kasir Gagal Dihapus',
	    		'kode' => '01'
	    	];
    	}
    	return $data;
	}
}
