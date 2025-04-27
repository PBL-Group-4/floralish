<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Menampilkan halaman dengan navbar
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('navbar');
    }
} 