<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            ['id' => 1, 'produk' => 'Bunga Mawar'],
            ['id' => 2, 'produk' => 'Buket Ulang Tahun'],
            ['id' => 3, 'produk' => 'Standing Flower'],
        ];

        return view('list_product', compact('data'));
    }
}
