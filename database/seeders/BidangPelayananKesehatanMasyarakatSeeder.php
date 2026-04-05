<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangPelayananKesehatanMasyarakatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('bidang_pelayanan_kesehatan_masyarakats')->insert([
            [
                'month' => 1,
                'persentase_fasyankes_terakreditasi' => 75.5,
                'jumlah_rs_terakreditasi' => 8,
                'jumlah_puskesmas_terakreditasi_madya' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 2,
                'persentase_fasyankes_terakreditasi' => 78.3,
                'jumlah_rs_terakreditasi' => 9,
                'jumlah_puskesmas_terakreditasi_madya' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 3,
                'persentase_fasyankes_terakreditasi' => 80.1,
                'jumlah_rs_terakreditasi' => 10,
                'jumlah_puskesmas_terakreditasi_madya' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'month' => 4,
                'persentase_fasyankes_terakreditasi' => 82.7,
                'jumlah_rs_terakreditasi' => 12,
                'jumlah_puskesmas_terakreditasi_madya' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

