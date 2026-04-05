<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangKesehatnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         \App\Models\BidangKesehatanMasyarakat::create([
        'year' => 2024,
        'month' => 'Mei',
        'lokasi' => 'Kabupaten X',
        'angka_kematian_ibu_per_100000' => 120.5,
        'angka_kematian_bayi_per_1000' => 12.3,
        'prevalensi_stunting' => 24.5,
        'cakupan_asi_eksklusif' => 42.0,
    ]);
    }
}
