<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class productSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'productName' => 'Paramex',
            'code' => 'PRM001',
            'composition' => 'Paracetamol 500mg, Caffeine 30mg',
            'description' => 'Obat pereda nyeri dan penurun demam',
            'sideEffects' => 'Mual, pusing ringan',
            'image' => 'products/paramex.jpg',
            'expired' => '2025-12-31',
            'stock' => 50,
            'category' => 'Obat Bebas',
            'price' => 15000,
        ]);

        Product::create([
            'productName' => 'Bodrex',
            'code' => 'BDX002',
            'composition' => 'Paracetamol 500mg, Caffeine 65mg',
            'description' => 'Pereda sakit kepala dan demam',
            'sideEffects' => 'Mual, jantung berdebar',
            'image' => 'products/bodrex.jpg',
            'expired' => '2026-01-15',
            'stock' => 40,
            'category' => 'Obat Bebas',
            'price' => 12000,
        ]);

        Product::create([
            'productName' => 'Antimo',
            'code' => 'ATM003',
            'composition' => 'Dimenhydrinate 50mg',
            'description' => 'Obat anti mual dan mabuk perjalanan',
            'sideEffects' => 'Mengantuk',
            'image' => 'products/antimo.jpg',
            'expired' => '2025-11-30',
            'stock' => 60,
            'category' => 'Obat Bebas',
            'price' => 18000,
        ]);

        Product::create([
            'productName' => 'Panadol',
            'code' => 'PND004',
            'composition' => 'Paracetamol 500mg',
            'description' => 'Obat pereda nyeri dan demam',
            'sideEffects' => 'Jarang ada',
            'image' => 'products/panadol.jpg',
            'expired' => '2026-05-20',
            'stock' => 70,
            'category' => 'Obat Bebas',
            'price' => 14000,
        ]);

        Product::create([
            'productName' => 'Komix',
            'code' => 'KMX005',
            'composition' => 'Dextromethorphan HBr 15mg',
            'description' => 'Obat batuk berdahak',
            'sideEffects' => 'Sakit kepala ringan',
            'image' => 'products/komix.jpg',
            'expired' => '2026-08-10',
            'stock' => 30,
            'category' => 'Obat Bebas',
            'price' => 13000,
        ]);
    }
}