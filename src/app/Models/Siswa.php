<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Model Siswa digunakan untuk proses login Siswa dan menyimpan data profil siswa.
 */
class Siswa extends Authenticatable
{
    // Nama tabel
    protected $table = 'siswa';

    // Kolom yang dijaga (kosong berarti semua boleh diisi)
    protected $guarded = [];
    
    // Siswa menggunakan NISN sebagai pengenal unik (Primary Key)
    protected $primaryKey = 'nisn'; 
    
    // Karena NISN bukan angka auto-increment, maka ini harus disetel false
    public $incrementing = false;

    // Tipe data primary key adalah string (karakter)
    protected $keyType = 'string';

    public $timestamps = false;

    /**
     * Casting password agar aman.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi: Satu Siswa termasuk dalam satu Kelas (Many-to-One).
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    /**
     * Relasi: Satu Siswa memiliki satu data SPP yang diikuti (Many-to-One).
     */
    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
}
