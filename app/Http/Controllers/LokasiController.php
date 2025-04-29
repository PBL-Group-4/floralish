<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $stores = [
            'Batam', 'Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Padang',
            'Palembang', 'Pekanbaru', 'Pontianak', 'Kupang', 'Ambon', 'Manado',
            'Makassar', 'Banjarmasin', 'Samarinda'
        ];

        return view('lokasi', compact('stores'));
    }
}
