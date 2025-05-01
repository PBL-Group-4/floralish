<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        // Debug detail untuk setiap produk
        foreach($products as $product) {
            \Log::info('Product Debug:', [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'image_url' => $product->image_url,
                'category' => $product->category
            ]);
        }
        
        // Debug URL gambar
        foreach($products as $product) {
            \Log::info('Product Image URL:', [
                'name' => $product->name,
                'image_url' => $product->image_url
            ]);
        }
        
        return view('welcome', compact('products'));
    }
    
    public function contact()
    {
        return view('contact');
    }
}
