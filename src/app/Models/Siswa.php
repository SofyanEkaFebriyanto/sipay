<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';
    protected $guarded = [];
    
    // Karena siswa login pakai NISN, pastikan Laravel tahu primary key-nya (sesuaikan dengan ERD kalian)
    protected $primaryKey = 'nisn'; 
    
    // Beri tahu Laravel kalau NISN itu huruf/angka (string), bukan angka berurutan (auto-increment)
    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
}
