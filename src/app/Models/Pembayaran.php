<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Pembayaran mencatat setiap transaksi pembayaran yang dilakukan oleh siswa.
 */
class Pembayaran extends Model
{
    // Nama tabel
    protected $table = 'pembayaran';

    // Primary Key
    protected $primaryKey = 'id_pembayaran';

    // Semua kolom boleh diisi
    protected $guarded = [];

    public $timestamps = false;

    /**
     * Relasi: Transaksi pembayaran dicatat oleh satu Petugas (Many-to-One).
     */
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    /**
     * Relasi: Transaksi pembayaran dilakukan untuk satu Siswa (Many-to-One).
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}
