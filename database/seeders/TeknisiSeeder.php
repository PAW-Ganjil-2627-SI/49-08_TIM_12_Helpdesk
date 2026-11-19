<?php

namespace Database\Seeders;

use App\Models\Teknisi;
use Illuminate\Database\Seeder;

class TeknisiSeeder extends Seeder
{
    public function run(): void
    {
        $dataTeknisi = [
            [
                'user_id'      => null,
                'nama'         => 'Budi Santoso',
                'spesialisasi' => 'Network',
                'email'        => 'budi.network@helpdesk.local',
                'telepon'      => '081234567801',
                'status'       => 'tersedia',
            ],
            [
                'user_id'      => null,
                'nama'         => 'Siti Rahmawati',
                'spesialisasi' => 'DB',
                'email'        => 'siti.db@helpdesk.local',
                'telepon'      => '081234567802',
                'status'       => 'tersedia',
            ],
            [
                'user_id'      => null,
                'nama'         => 'Andi Pratama',
                'spesialisasi' => 'Hardware',
                'email'        => 'andi.hardware@helpdesk.local',
                'telepon'      => '081234567803',
                'status'       => 'sibuk',
            ],
            [
                'user_id'      => null,
                'nama'         => 'Dewi Lestari',
                'spesialisasi' => 'Network',
                'email'        => 'dewi.network@helpdesk.local',
                'telepon'      => '081234567804',
                'status'       => 'libur',
            ],
        ];

        foreach ($dataTeknisi as $item) {
            Teknisi::updateOrCreate(
                ['email' => $item['email']],
                $item
            );
        }
    }
}