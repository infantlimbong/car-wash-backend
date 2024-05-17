<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    // Fields untuk tabel Mobil
    protected $fillable = [
        'user_id',
        'model_mobil',
        'nomor_plat',
        'warna_mobil'
    ];
}
