<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            ['id' => 1, 'produk' => 'Buket Mawar'],
            ['id' => 2, 'produk' => 'Buket Coklat'],
        ];

        return view('list_product', ['data' => $data]);
    }
}