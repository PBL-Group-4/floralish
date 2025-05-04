<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            
            // Debug detail untuk setiap produk
            foreach($products as $product) {
                Log::info('Product Debug:', [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'image_url' => $product->image_url ?? 'No image URL',
                    'category' => $product->category ?? 'No category'
                ]);
            }
            
            // Debug URL gambar
            foreach($products as $product) {
                Log::info('Product Image URL:', [
                    'name' => $product->name,
                    'image_url' => $product->image_url
                ]);
            }
            
            return view('welcome', compact('products'));
        } catch (\Exception $e) {
            Log::error('Error in HomeController@index: ' . $e->getMessage());
            return view('welcome', ['products' => collect([])]);
        }
    }
    
    public function contact()
    {
        return view('contact');
    }
}
