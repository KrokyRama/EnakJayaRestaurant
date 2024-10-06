<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // ubah sesuai menu yang ingin ditampilkan berdasarkan id
        $menus = Menu::whereIn('menu_id', [4, 12, 20])->get();
        return view('home.index', compact('menus'));    }
    public function shop()
    {
        $allmenus = Menu::all();
        return view('home.shop', compact('allmenus'));
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

    public function member()
    {
        return view('member');
    }

    public function membercoba()
    {
        return view('cobamember');
    }
}
