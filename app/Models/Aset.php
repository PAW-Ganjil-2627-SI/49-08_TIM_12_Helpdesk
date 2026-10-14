<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $fillable = ['kode', 'perangkat', 'departemen', 'pengguna', 'kondisi', 'servis_terakhir'];

    protected $casts = ['servis_terakhir' => 'date'];
}