<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = ['judul', 'kategori', 'kategori_id', 'langkah'];

    public function kategoriObj()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function daftarLangkah(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\R/', $this->langkah))));
    }
}