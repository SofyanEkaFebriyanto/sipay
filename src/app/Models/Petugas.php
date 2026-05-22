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

    // Mengizinkan pengisian semua kolom (guarded kosong)
    protected $guarded = [];
    
    // Menentukan Primary Key tabel
    protected $primaryKey = 'id_petugas';

    // Nonaktifkan timestamps otomatis (created_at, updated_at)
    public $timestamps = false;

    /**
     * Casting password agar otomatis di-hash.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
