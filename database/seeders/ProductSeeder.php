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
                'category' => 'Bunga',
                'image' => 'images/default-product.jpg'
            ],
            [
                'name' => 'Box Bunga Lavender',
                'description' => 'Box bunga lavender segar dengan 20 tangkai',
                'price' => 450000,
                'stock' => 30,
                'category' => 'Bunga',
                'image' => 'images/default-product.jpg'
            ],
            [
                'name' => 'Papan Bunga Duka',
                'description' => 'Papan bunga duka dengan rangkaian bunga segar',
                'price' => 1250000,
                'stock' => 10,
                'category' => 'Karangan Bunga Papan',
                'image' => 'images/default-product.jpg'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 