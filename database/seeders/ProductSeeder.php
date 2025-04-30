<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Buket Mawar Merah',
                'description' => 'Buket mawar merah segar dengan 12 tangkai',
                'price' => 350000,
                'stock' => 50,
                'image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80'
            ],
            [
                'name' => 'Box Bunga Lavender',
                'description' => 'Box bunga lavender segar dengan 20 tangkai',
                'price' => 450000,
                'stock' => 30,
                'image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80'
            ],
            [
                'name' => 'Papan Bunga Duka',
                'description' => 'Papan bunga duka dengan rangkaian bunga segar',
                'price' => 1250000,
                'stock' => 10,
                'image' => 'https://images.unsplash.com/photo-1561181286-d3fee7d55364?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 