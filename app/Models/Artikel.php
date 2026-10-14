<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['judul', 'kategori', 'langkah'];

    public function daftarLangkah(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\R/', $this->langkah))));
    }
}