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

        Product::create([
            'productName' => 'OBH Combi',
            'code' => 'OBH006',
            'composition' => 'Paracetamol, Guaifenesin, Dextromethorphan',
            'description' => 'Obat batuk dan flu',
            'sideEffects' => 'Ngantuk, pusing ringan',
            'image' => 'products/obh_combi.jpg',
            'expired' => '2026-09-15',
            'stock' => 45,
            'category' => 'Obat Bebas',
            'price' => 16000,
        ]);

        Product::create([
            'productName' => 'Neozep Forte',
            'code' => 'NZP007',
            'composition' => 'Paracetamol, Phenylephrine HCl, Chlorpheniramine Maleate',
            'description' => 'Obat flu dan pilek',
            'sideEffects' => 'Mengantuk, mulut kering',
            'image' => 'products/neozep.jpg',
            'expired' => '2026-04-25',
            'stock' => 35,
            'category' => 'Obat Bebas',
            'price' => 17000,
        ]);

        Product::create([
            'productName' => 'Betadine',
            'code' => 'BTD008',
            'composition' => 'Povidone Iodine 10%',
            'description' => 'Antiseptik luka luar',
            'sideEffects' => 'Iritasi kulit ringan',
            'image' => 'products/betadine.jpg',
            'expired' => '2027-02-10',
            'stock' => 25,
            'category' => 'Antiseptik',
            'price' => 22000,
        ]);

        Product::create([
            'productName' => 'Entrostop',
            'code' => 'ENT009',
            'composition' => 'Attapulgite, Pectin',
            'description' => 'Obat diare',
            'sideEffects' => 'Sembelit',
            'image' => 'products/entrostop.jpg',
            'expired' => '2026-03-30',
            'stock' => 55,
            'category' => 'Obat Bebas',
            'price' => 10000,
        ]);

        Product::create([
            'productName' => 'Promag',
            'code' => 'PMG010',
            'composition' => 'Hydrotalcite, Magnesium Hydroxide, Simethicone',
            'description' => 'Obat maag dan perut kembung',
            'sideEffects' => 'Sembelit atau diare ringan',
            'image' => 'products/promag.jpg',
            'expired' => '2026-10-05',
            'stock' => 50,
            'category' => 'Obat Bebas',
            'price' => 9000,
        ]);

        Product::create([
            'productName' => 'Minyak Kayu Putih',
            'code' => 'MKP011',
            'composition' => 'Oleum Cajuputi',
            'description' => 'Minyak untuk menghangatkan tubuh',
            'sideEffects' => 'Iritasi pada kulit sensitif',
            'image' => 'products/kayuputih.jpg',
            'expired' => '2027-01-20',
            'stock' => 40,
            'category' => 'Minyak Gosok',
            'price' => 11000,
        ]);

        Product::create([
            'productName' => 'Sanmol',
            'code' => 'SNM012',
            'composition' => 'Paracetamol 500mg',
            'description' => 'Penurun demam dan pereda nyeri',
            'sideEffects' => 'Mual ringan',
            'image' => 'products/sanmol.jpg',
            'expired' => '2025-10-18',
            'stock' => 65,
            'category' => 'Obat Bebas',
            'price' => 10000,
        ]);
    }
}