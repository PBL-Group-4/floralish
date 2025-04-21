<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListBarangController extends Controller
{
    public function getData()
    {
       $dataBarang  = [
        ['id' => 1, 'nama' => 'Bunga 1', 'harga' => 15000],
        ['id' => 2, 'nama' => 'Bunga 2', 'harga' => 20000],
        ['id' => 3, 'nama' => 'Bunga 3', 'harga' => 13500],
        ['id' => 4, 'nama' => 'Bunga 4', 'harga' => 3200],
        ['id' => 5, 'nama' => 'Bunga 5', 'harga' => 14000],
       ];
       
       return $dataBarang;
    }

    public function tampilkan(){
        $data = $this->getData();
        return view('list_barang', compact('data'));
    }
}
