<?php

namespace Database\Seeders;

use App\Models\Aset;
use Illuminate\Database\Seeder;

class AsetSeeder extends Seeder
{
    public function run(): void
    {
        $asets = [
            [
                'kode' => 'PC-HRD-001',
                'perangkat' => 'Lenovo Ideapad Slim 3i',
                'departemen' => 'HRD',
                'pengguna' => 'Bayu Sucipto',
                'kondisi' => 'Baik',
                'servis_terakhir' => '2026-09-15',
            ],
            [
                'kode' => 'LP-FIN-002',
                'perangkat' => 'Lenovo ThinkPad T14 Gen 4',
                'departemen' => 'Finance',
                'pengguna' => 'Muhammad Ghulam Arroya',
                'kondisi' => 'Baik',
                'servis_terakhir' => '2026-10-02',
            ],
            [
                'kode' => 'PC-OPS-003',
                'perangkat' => 'lenovo LOQ',
                'departemen' => 'Operasional',
                'pengguna' => 'Rain hanas',
                'kondisi' => 'Perlu Servis',
                'servis_terakhir' => '2026-06-20',
            ],
            [
                'kode' => 'PR-IT-004',
                'perangkat' => 'Epson EcoTank L3250',
                'departemen' => 'IT Support',
                'pengguna' => null,
                'kondisi' => 'Baik',
                'servis_terakhir' => '2026-10-18',
            ],
            [
                'kode' => 'PC-MKT-005',
                'perangkat' => 'Asus ExpertCenter D5',
                'departemen' => 'Marketing',
                'pengguna' => 'Michael Gray',
                'kondisi' => 'Rusak',
                'servis_terakhir' => '2026-05-11',
            ],
        ];

        foreach ($asets as $aset) {
            Aset::updateOrCreate(
                ['kode' => $aset['kode']],
                $aset
            );
        }
    }
}