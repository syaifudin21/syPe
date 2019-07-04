<?php

namespace App\Http\Controllers\Ownner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:ownner');
    }
    public function index()
    {
    	return view('ownner.ownner-home');
    }
}
