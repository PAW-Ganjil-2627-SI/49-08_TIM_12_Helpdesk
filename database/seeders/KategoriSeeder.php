<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama'      => 'Hardware',
                'deskripsi' => 'Kerusakan atau gangguan pada perangkat fisik seperti komputer, laptop, printer, dan periferal lainnya.',
                'contoh'    => 'Layar tidak menyala, keyboard macet, printer kertas nyangkut, mouse tidak terdeteksi.',
            ],
            [
                'nama'      => 'Software',
                'deskripsi' => 'Masalah pada aplikasi, sistem operasi, atau perangkat lunak yang digunakan sehari-hari.',
                'contoh'    => 'Aplikasi crash, Windows update gagal, lisensi Office expired, antivirus tidak terupdate.',
            ],
            [
                'nama'      => 'Jaringan & Internet',
                'deskripsi' => 'Gangguan koneksi jaringan lokal (LAN), Wi-Fi, VPN, atau akses internet.',
                'contoh'    => 'Wi-Fi tidak bisa connect, internet lambat, tidak bisa akses shared folder, VPN gagal masuk.',
            ],
            [
                'nama'      => 'Akun & Email',
                'deskripsi' => 'Masalah terkait akun pengguna, password, hak akses, dan layanan email kantor.',
                'contoh'    => 'Lupa password Windows, akun dikunci, email tidak bisa kirim, tidak bisa login ke sistem HRIS.',
            ],
            [
                'nama'      => 'Keamanan & Virus',
                'deskripsi' => 'Insiden keamanan siber seperti infeksi malware, phishing, atau aktivitas mencurigakan.',
                'contoh'    => 'PC terinfeksi ransomware, menerima email phishing, file tiba-tiba terenkripsi.',
            ],
            [
                'nama'      => 'Data & Backup',
                'deskripsi' => 'Masalah terkait kehilangan data, pemulihan file, atau kegagalan proses backup.',
                'contoh'    => 'File terhapus tidak sengaja, backup gagal berjalan, data korup setelah mati lampu.',
            ],
        ];

        foreach ($data as $row) {
            Kategori::firstOrCreate(['nama' => $row['nama']], $row);
        }
    }
}
