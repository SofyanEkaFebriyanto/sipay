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

    // Daftar kolom yang boleh diisi (mass assignment)
    protected $fillable = ['id_petugas', 'nisn', 'tgl_bayar', 'bulan_dibayar', 'tahun_dibayar', 'id_spp', 'jumlah_bayar'];

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
