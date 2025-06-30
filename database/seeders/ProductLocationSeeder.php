<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Jakarta Products
        $jakartaProducts = [
            [
                'name' => 'Bouquet Mawar Merah Jakarta',
                'description' => 'Rangkaian mawar merah segar dari Jakarta',
                'price' => 250000,
                'category' => 'Bunga',
                'location' => 'Jakarta',
                'image' => 'products/bouquet-mawar-merah.jpg',
                'stock' => 10,
            ],
            [
                'name' => 'Karangan Bunga Papan Jakarta',
                'description' => 'Karangan bunga papan untuk ucapan selamat',
                'price' => 500000,
                'category' => 'Karangan Bunga Papan',
                'location' => 'Jakarta',
                'image' => 'products/karangan-bunga-papan.jpg',
                'stock' => 7,
            ],
            [
                'name' => 'Kado Spesial Jakarta',
                'description' => 'Kado spesial dengan bunga dan coklat',
                'price' => 350000,
                'category' => 'Kado & Cakes',
                'location' => 'Jakarta',
                'image' => 'products/kado-spesial.jpg',
                'stock' => 5,
            ]
        ];

        // Bandung Products
        $bandungProducts = [
            [
                'name' => 'Bouquet Mawar Merah Bandung',
                'description' => 'Rangkaian mawar merah segar dari Bandung',
                'price' => 230000,
                'category' => 'Bunga',
                'location' => 'Bandung',
                'image' => 'products/bouquet-mawar-merah.jpg',
                'stock' => 12,
            ],
            [
                'name' => 'Karangan Bunga Papan Bandung',
                'description' => 'Karangan bunga papan untuk ucapan selamat',
                'price' => 480000,
                'category' => 'Karangan Bunga Papan',
                'location' => 'Bandung',
                'image' => 'products/karangan-bunga-papan.jpg',
                'stock' => 6,
            ],
            [
                'name' => 'Kado Spesial Bandung',
                'description' => 'Kado spesial dengan bunga dan coklat',
                'price' => 330000,
                'category' => 'Kado & Cakes',
                'location' => 'Bandung',
                'image' => 'products/kado-spesial.jpg',
                'stock' => 4,
            ]
        ];

        // Insert Jakarta Products
        foreach ($jakartaProducts as $product) {
            Product::create($product);
        }

        // Insert Bandung Products
        foreach ($bandungProducts as $product) {
            Product::create($product);
        }

        Product::insert([
            [
                'name' => 'Buket Mawar Merah',
                'description' => 'Buket bunga mawar merah segar, cocok untuk hadiah romantis.',
                'price' => 150000,
                'stock' => 20,
                'category' => 'Bunga',
                'location' => 'Jakarta',
                'image' => 'images/default-product.jpg',
            ],
            [
                'name' => 'Buket Ulang Tahun',
                'description' => 'Buket bunga warna-warni untuk ulang tahun.',
                'price' => 120000,
                'stock' => 15,
                'category' => 'Bunga',
                'location' => 'Bandung',
                'image' => 'images/default-product.jpg',
            ],
            [
                'name' => 'Karangan Bunga Papan',
                'description' => 'Karangan bunga papan untuk ucapan selamat atau duka cita.',
                'price' => 500000,
                'stock' => 5,
                'category' => 'Karangan Bunga Papan',
                'location' => 'Surabaya',
                'image' => 'images/default-product.jpg',
            ],
            [
                'name' => 'Kado & Cake Spesial',
                'description' => 'Paket kado dan kue untuk momen spesial.',
                'price' => 250000,
                'stock' => 10,
                'category' => 'Kado & Cakes',
                'location' => 'Batam',
                'image' => 'images/default-product.jpg',
            ],
            [
                'name' => 'Buket Lily Putih',
                'description' => 'Buket bunga lily putih elegan.',
                'price' => 180000,
                'stock' => 8,
                'category' => 'Bunga',
                'location' => 'Medan',
                'image' => 'images/default-product.jpg',
            ],
        ]);
    }
} 