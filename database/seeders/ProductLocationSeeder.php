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
                'image' => 'products/bouquet-mawar-merah.jpg'
            ],
            [
                'name' => 'Karangan Bunga Papan Jakarta',
                'description' => 'Karangan bunga papan untuk ucapan selamat',
                'price' => 500000,
                'category' => 'Karangan Bunga Papan',
                'location' => 'Jakarta',
                'image' => 'products/karangan-bunga-papan.jpg'
            ],
            [
                'name' => 'Kado Spesial Jakarta',
                'description' => 'Kado spesial dengan bunga dan coklat',
                'price' => 350000,
                'category' => 'Kado & Cakes',
                'location' => 'Jakarta',
                'image' => 'products/kado-spesial.jpg'
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
                'image' => 'products/bouquet-mawar-merah.jpg'
            ],
            [
                'name' => 'Karangan Bunga Papan Bandung',
                'description' => 'Karangan bunga papan untuk ucapan selamat',
                'price' => 480000,
                'category' => 'Karangan Bunga Papan',
                'location' => 'Bandung',
                'image' => 'products/karangan-bunga-papan.jpg'
            ],
            [
                'name' => 'Kado Spesial Bandung',
                'description' => 'Kado spesial dengan bunga dan coklat',
                'price' => 330000,
                'category' => 'Kado & Cakes',
                'location' => 'Bandung',
                'image' => 'products/kado-spesial.jpg'
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
    }
} 