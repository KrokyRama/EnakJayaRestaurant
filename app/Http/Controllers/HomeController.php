<?php

namespace App\Http\Controllers;
use illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function shop()
    {
        return view('home.shop');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function admin()
    {
        return view('admin');
    }
}
