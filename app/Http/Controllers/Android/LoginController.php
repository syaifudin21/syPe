<?php

namespace App\Http\Controllers\Android;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kasir;
use Illuminate\Support\Facades\Auth;
use App\Models\Outlet;

class LoginController extends Controller
{
    public function outletlogin(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('outlet')->attempt($credential, false)){
        	$outlet = Outlet::where('username', $request->username)->first();
            $data = [
            	'message' => 'Berhasil login',
            	'profil' => $outlet,
            	'kode' => '00'
            ];
        }else{
        	 $data = [
            	'message' => 'Gagal Login',
            	'kode' => '01'
            ];
        }
        return $data;
    }
    public function kasirlogin(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('kasir')->attempt($credential, false)){
        	$kasir = Kasir::where('username', $request->username)->first();
            $data = [
            	'message' => 'Berhasil login',
            	'profil' => $kasir,
            	'kode' => '00'
            ];
        }else{
        	 $data = [
            	'message' => 'Gagal Login',
            	'kode' => '01'
            ];
        }
        return $data;
    }
    //
}
