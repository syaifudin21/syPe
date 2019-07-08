<?php

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KasirController extends Controller
{
    public function kasirstore(Request $request)
    {

        $chek = Kasir_outlet::where('username', $request->username)->first();
        if (!empty($chek)) {
        	$data = [
	    		'message' =>'Username Sudah dipakai',
	    		'kode' => '03'
	    	];
        } else {
	        $kasir = new Kasir_outlet();
	        $kasir->fill($request->all());
	        // $outlet['status'] = (!empty($request->status))?implode(',', $request['status']):'';
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
    	$profil = Kasir_outlet::find($request->id_kasir);
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

    public function kasirrubahpassword(Request $request)
    {
    	$profil = Kasir_outlet::find($request->id_kasir);
    	if (!empty($profil)) {
	        if (Hash::check($request->passwordlama, $profil->password)){
	            if ($request->passwordbaru == $request->cpasswordbaru){
	                $passwordbaru = Hash::make($request->passwordbaru);
	                $profil->update(['password' => $passwordbaru]);
	                $data = [
			    		'message' =>'Password berhasil diupdate',
			    		'kode' => '00'
			    	];
	            }else{
	                $data = [
			    		'message' =>'Konfirmasi password baru tidak sesuai.',
			    		'kode' => '03'
			    	];
	            }
	        }else{
	            $data = [
		    		'message' =>'Password lama tidak sesuai',
		    		'kode' => '02'
		    	];
	        }
    	}else{
    		$data = [
	    		'message' =>'ID ini tidak terdaftar',
	    		'kode' => '01'
	    	];
    	}
    	return $data;
    }
    
    public function kasirupdate(Request $request)
    {
    	$kasir = Kasir_outlet::find($request->id_kasir);
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
}
