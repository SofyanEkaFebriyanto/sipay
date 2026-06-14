<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Model Petugas digunakan untuk proses login Admin dan Petugas.
 */
class Petugas extends Authenticatable
{
    // Menentukan nama tabel di database
    protected $table = 'petugas';

    // Daftar kolom yang boleh diisi (mass assignment)
    protected $fillable = ['username', 'password', 'nama_petugas', 'level'];
    
    // Menentukan Primary Key tabel
    protected $primaryKey = 'id_petugas';

    // Nonaktifkan timestamps otomatis (created_at, updated_at)
    public $timestamps = false;

    /**
     * Casting password agar otomatis di-hash saat disimpan.
     * Menggunakan property $casts (cara penulisan yang lebih sederhana).
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
