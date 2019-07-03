<?php

namespace App\Http\Controllers\Outlet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:outlet')->except(['logout']);
    }
    public function form()
    {
        return view('outlet.outlet-login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:4'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::guard('outlet')->attempt($credential, false)){
            return redirect()->intended(route('outlet.home'));
        }

        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('outlet')->logout();
        return redirect(route('outlet.login'));
    }
}
