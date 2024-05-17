<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Fields untuk tabel Pembayaran
    protected $fillable = [
        'permintaan_id',
        'jumlah',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'status_pembayaran'
    ];
}
