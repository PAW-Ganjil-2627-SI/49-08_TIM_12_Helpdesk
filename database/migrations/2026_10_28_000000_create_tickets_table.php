<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('no_tiket', 20)->unique();
            $table->string('nama', 100);
            $table->string('departemen', 100);
            $table->string('kategori', 100);
            $table->string('aset', 30)->nullable();
            $table->string('judul', 150);
            $table->text('deskripsi');
            $table->enum('prioritas', ['rendah', 'sedang', 'mendesak'])->default('sedang');
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
