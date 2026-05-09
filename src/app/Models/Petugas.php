<?php

namespace App\Models;

// Hapus 'use Illuminate\Database\Eloquent\Model;'
// Ganti dengan class khusus untuk Login di bawah ini:
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    // Kasih tau Laravel nama tabel yang benar di database
    protected $table = 'petugas';

    // Izinkan semua kolom untuk diisi (sintaks dasar yang paling gampang)
    protected $guarded = [];
    
    // (Opsional) Kalau primary key-nya bukan 'id', misalnya 'id_petugas', hilangkan tanda komentar di bawah ini:
    // protected $primaryKey = 'id_petugas';
}