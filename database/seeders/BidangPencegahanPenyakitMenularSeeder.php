<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BidangPencegahanPenyakitMenular;

class BidangPencegahanPenyakitMenularSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'bulan' => 'Mei',
                'persentase_pelayanan_klb' => 88,
                'temuan_kasus_tb' => 42,
                'persentase_imunisasi_dasar' => 91,
                'pengendalian_konsumsi_merokok' => 17,
                'persentase_penanganan_krisis_kesehatan' => 84,
            ],
            [
                'bulan' => 'Juni',
                'persentase_pelayanan_klb' => 86,
                'temuan_kasus_tb' => 40,
                'persentase_imunisasi_dasar' => 92,
                'pengendalian_konsumsi_merokok' => 18,
                'persentase_penanganan_krisis_kesehatan' => 85,
            ],
            [
                'bulan' => 'Juli',
                'persentase_pelayanan_klb' => 90,
                'temuan_kasus_tb' => 37,
                'persentase_imunisasi_dasar' => 94,
                'pengendalian_konsumsi_merokok' => 16,
                'persentase_penanganan_krisis_kesehatan' => 87,
            ],
            [
                'bulan' => 'Agustus',
                'persentase_pelayanan_klb' => 91,
                'temuan_kasus_tb' => 35,
                'persentase_imunisasi_dasar' => 95,
                'pengendalian_konsumsi_merokok' => 15,
                'persentase_penanganan_krisis_kesehatan' => 89,
            ],
        ];

        foreach ($data as $item) {
            BidangPencegahanPenyakitMenular::create($item);
        }
    }
}

