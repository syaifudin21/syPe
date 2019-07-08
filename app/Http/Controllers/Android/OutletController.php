<?php

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutletController extends Controller
{	
    public function profil(Request $request)
    {
    	$profil = Outlet::find($request->outlet_id);
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
    public function rubahpassword(Request $request)
    {
    	$profil = Outlet::find($request->outlet_id);
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
    
    public function rubahprofil(Request $request)
    {
    	$user = Outlet::find($request->outlet_id);

        if (!empty($user)) {
        	$user['alamat'] = $request->alamat;
	    	$user['foto'] = $request->foto;
	        $user->update();
        	$data = [
        		'message' => 'Berhasil mengupdate profil',
        		'kede' => '00'
        	];
        } else {
        	$data = [
        		'message' => 'Gagal mengupdate profil',
        		'kede' => '01'
        	];
        }
        return $data;
    }
    

    
}
