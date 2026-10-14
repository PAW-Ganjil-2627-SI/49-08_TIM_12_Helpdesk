<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    protected $fillable = ['nama', 'spesialisasi', 'email', 'telepon', 'status'];
}