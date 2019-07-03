<?php

namespace App\Http\Controllers\Ownner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:ownner')->except(['logout']);
    }
    public function form()
    {
        return view('ownner.ownner-login');
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
        if (Auth::guard('ownner')->attempt($credential, false)){
            return redirect()->intended(route('ownner.home'));
        }

        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('ownner')->logout();
        return redirect(route('ownner.login'));
    }
}
