<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $kategoris = Kategori::all()->keyBy('nama');

        $hardwareId = $kategoris->get('Hardware')?->id;
        $softwareId = $kategoris->get('Software')?->id;
        $jaringanId = $kategoris->get('Jaringan & Internet')?->id;
        $akunId     = $kategoris->get('Akun & Email')?->id;
        $keamananId = $kategoris->get('Keamanan & Virus')?->id;
        $dataId     = $kategoris->get('Data & Backup')?->id;

        $samples = [
            [
                'judul'       => 'Printer Tidak Merespons atau Berstatus Offline',
                'kategori_id' => $hardwareId,
                'langkah'     => "Pastikan kabel USB dan power printer terpasang dengan kencang.\nNyalakan ulang printer dengan menekan tombol power mati lalu hidup kembali.\nBuka Control Panel > Devices and Printers, klik kanan printer lalu hapus centang 'Use Printer Offline'.\nRestart service 'Print Spooler' lewat services.msc jika antrean dokumen macet.",
            ],
            [
                'judul'       => 'Wi-Fi Kantor Sering Terputus atau Tidak Bisa Connect',
                'kategori_id' => $jaringanId,
                'langkah'     => "Buka pengaturan Wi-Fi, pilih SSID kantor lalu klik 'Forget Network'.\nMatikan koneksi Wi-Fi laptop selama 10 detik lalu aktifkan kembali.\nSambungkan ulang Wi-Fi dan masukkan username serta password domain akun kantor.\nJika masih gagal, restart adapter jaringan melalui Network Connections.",
            ],
            [
                'judul'       => 'Aplikasi Microsoft Office Meminta Aktivasi / Lisensi Habis',
                'kategori_id' => $softwareId,
                'langkah'     => "Pastikan laptop tersambung ke jaringan LAN atau VPN kantor.\nBuka aplikasi Word atau Excel, klik menu File > Account.\nKlik tombol 'Switch Account' lalu login menggunakan email korporat resmi.\nRestart aplikasi Office untuk memverifikasi pembaruan lisensi otomatis.",
            ],
            [
                'judul'       => 'Akun Domain Terkunci Akibat Salah Memasukkan Password',
                'kategori_id' => $akunId,
                'langkah'     => "Tunggu selama 15 menit agar sistem melakukan auto-unlock security timer.\nPastikan tombol Caps Lock pada keyboard tidak dalam kondisi aktif.\nJika akun belum terbuka setelah 15 menit, hubungi helpdesk atau buat tiket permohonan reset password.\nSiapkan NIK/NIP karyawan untuk verifikasi identitas akun.",
            ],
            [
                'judul'       => 'Menghadapi Email Mencurigakan (Phishing)',
                'kategori_id' => $keamananId,
                'langkah'     => "Jangan klik tautan (link) atau mengunduh lampiran apapun di dalam email.\nPeriksa alamat email pengirim, pastikan domain resmi dan bukan ejaan tiruan.\nTeruskan email tersebut ke tim Security IT untuk investigasi malware.\nHapus email secara permanen dari kotak masuk setelah dilaporkan.",
            ],
            [
                'judul'       => 'Memulihkan File yang Tidak Sengaja Terhapus di Shared Drive',
                'kategori_id' => $dataId,
                'langkah'     => "Buka folder lokasi file yang sebelumnya terhapus pada shared network drive.\nKlik kanan area kosong folder, pilih menu 'Properties'.\nBuka tab 'Previous Versions' untuk melihat backup snapshot harian.\nPilih versi tanggal sebelum file terhapus, lalu klik tombol 'Restore'.",
            ],
        ];

        foreach ($samples as $sample) {
            Artikel::firstOrCreate(['judul' => $sample['judul']], $sample);
        }
    }
}
