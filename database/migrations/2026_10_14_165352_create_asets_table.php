<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30)->unique();
            $table->string('perangkat', 100);
            $table->string('departemen', 100);
            $table->string('pengguna', 100)->nullable();
            $table->string('kondisi')->default('Baik');
            $table->date('servis_terakhir')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};