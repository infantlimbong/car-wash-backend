<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    // Fields untuk tabel Permintaan
    protected $fillable = [
        'user_id',
        'mobil_id',
        'layanan_id',
        'status'
    ];
}
