<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'no_tiket', 'nama', 'departemen', 'kategori',
        'aset', 'judul', 'deskripsi', 'prioritas', 'status',
    ];
}
