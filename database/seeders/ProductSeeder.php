<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Ikan Kering',
                'description' => 'Ikan kering berkualitas tinggi dari nelayan lokal Desa Rakadua. Diproses secara tradisional dengan garam dan sinar matahari.',
                'price' => 25000,
                'stock' => 50,
                'category' => 'Makanan',
                'phone' => '628123456789',
                'image_path' => null,
            ],
            [
                'name' => 'Terasi',
                'description' => 'Terasi khas pesisir dengan cita rasa autentik. Dibuat dari udang segar dengan proses fermentasi alami.',
                'price' => 15000,
                'stock' => 30,
                'category' => 'Makanan',
                'phone' => '628123456789',
                'image_path' => null,
            ],
            [
                'name' => 'Kerupuk Ikan',
                'description' => 'Kerupuk ikan renyah dengan rasa gurih. Cocok untuk camilan atau pelengkap makanan.',
                'price' => 12000,
                'stock' => 40,
                'category' => 'Makanan',
                'phone' => '628123456789',
                'image_path' => null,
            ],
            [
                'name' => 'Kerajinan Anyaman',
                'description' => 'Kerajinan anyaman tradisional dari daun pandan. Produk unik dengan motif khas daerah.',
                'price' => 35000,
                'stock' => 15,
                'category' => 'Kerajinan',
                'phone' => '628123456789',
                'image_path' => null,
            ],
            [
                'name' => 'Batik Pesisir',
                'description' => 'Batik dengan motif pesisir yang menggambarkan kehidupan nelayan. Kain berkualitas tinggi.',
                'price' => 75000,
                'stock' => 10,
                'category' => 'Fashion',
                'phone' => '628123456789',
                'image_path' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
