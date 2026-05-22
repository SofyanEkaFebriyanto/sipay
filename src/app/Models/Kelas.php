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

    // Semua kolom boleh diisi
    protected $guarded = [];

    // Tidak menggunakan timestamps default
    public $timestamps = false;
}
