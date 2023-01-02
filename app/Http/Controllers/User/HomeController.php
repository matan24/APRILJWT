<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // ketika kita sudah login maka kita bisa mengakses homepage
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.home');
    }
}
