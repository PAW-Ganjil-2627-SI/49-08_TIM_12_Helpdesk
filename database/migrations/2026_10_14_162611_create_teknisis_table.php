<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teknisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('spesialisasi')->nullable();
            $table->string('email')->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('status')->default('tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teknisis');
    }
};