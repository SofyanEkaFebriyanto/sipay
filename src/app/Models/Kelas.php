<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Kelas merepresentasikan data kelas dan jurusan (kompetensi keahlian).
 */
class Kelas extends Model
{
    // Nama tabel
    protected $table = 'kelas';

    // Primary Key
    protected $primaryKey = 'id_kelas';

    // Daftar kolom yang boleh diisi (mass assignment)
    protected $fillable = ['nama_kelas', 'kompetensi_keahlian'];

    // Tidak menggunakan timestamps default
    public $timestamps = false;
}
