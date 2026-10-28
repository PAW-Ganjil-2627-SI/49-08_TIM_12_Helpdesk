<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teknisis', function (Blueprint $table) {
            // Opsional: teknisi boleh punya akun login sebagai staf support.
            // unique() ngejamin satu akun hanya terhubung ke satu teknisi.
            $table->foreignId('user_id')
                ->nullable()
                ->unique()
                ->after('id')
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('teknisis', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
