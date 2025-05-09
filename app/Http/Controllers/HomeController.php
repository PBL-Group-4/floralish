<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Product::select('category')->distinct()->get();
        return view('welcome', compact('products', 'categories'));
    }
    
    public function contact()
    {
        return view('contact');
    }
}
