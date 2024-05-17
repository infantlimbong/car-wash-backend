<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Fields untuk tabel user
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    // Menyembunyikan password agar tidak terlihat di frontend
    protected $hidden = [
        'password',
    ];

}
