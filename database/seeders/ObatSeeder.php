<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obats')->insert([
            [
                'nama' => 'Paracetamol',
                'kategori' => 'Sirup Kering',
                'stok' => 100,
                'harga' => 15000,
                'jenis' => 'Generik',
                'satuan' => 'mg',
                'jumlah' => 50
            ],
            [
                'nama' => 'Amoxicillin',
                'kategori' => 'Kapsul',
                'stok' => 50,
                'harga' => 25000,
                'jenis' => 'Generik',
                'satuan' => 'mg',
                'jumlah' => 20
            ],
            [
                'nama' => 'Betadine',
                'kategori' => 'Gel',
                'stok' => 200,
                'harga' => 50000,
                'jenis' => 'Racik',
                'satuan' => 'mg',
                'jumlah' => 30
            ],
            [
                'nama' => 'Dextromethorphan',
                'kategori' => 'Sirup Kering',
                'stok' => 150,
                'harga' => 12000,
                'jenis' => 'Generik',
                'satuan' => 'mg',
                'jumlah' => 100
            ],
            [
                'nama' => 'Hydrocortisone',
                'kategori' => 'Tube',
                'stok' => 80,
                'harga' => 35000,
                'jenis' => 'Racik',
                'satuan' => 'mg',
                'jumlah' => 40
            ]
        ]);
    }
}
