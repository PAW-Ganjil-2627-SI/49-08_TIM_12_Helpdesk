<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! app()->environment(['local', 'testing'])) {
            return;
        }

        // 1. Seed Master Data Kategori & Artikel Solusi
        $this->call([
            KategoriSeeder::class,
            ArtikelSeeder::class,
            AsetSeeder::class,
        ]);

        // 2. Seed Akun Admin Helpdesk
        $adminEmail = env('SEED_ADMIN_EMAIL', 'admin66@gmail.com');
        $admin = User::query()->firstOrNew(['email' => $adminEmail]);
        $admin->fill([
            'name'     => 'Admin Helpdesk',
            'password' => Hash::make(env('SEED_ADMIN_PASSWORD', 'grupgacor9')),
        ]);
        $admin->role = User::ROLE_ADMIN;
        $admin->email_verified_at = now();
        $admin->save();

        // 3. Seed Akun User / Karyawan Biasa
        $userEmail = env('SEED_USER_EMAIL', 'test@example.com');
        $user = User::query()->firstOrNew(['email' => $userEmail]);
        $user->fill([
            'name'     => 'Karyawan User',
            'password' => Hash::make(env('SEED_USER_PASSWORD', 'password')),
        ]);
        $user->role = User::ROLE_USER;
        $user->email_verified_at = now();
        $user->save();
    }
}
