<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Fields untuk tabel Layanan
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga'
    ];
}
