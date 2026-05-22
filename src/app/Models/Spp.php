<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Spp menyimpan data nominal tagihan SPP per tahun.
 */
class Spp extends Model
{
    // Nama tabel
    protected $table = 'spp';

    // Primary Key
    protected $primaryKey = 'id_spp';

    // Semua kolom boleh diisi
    protected $guarded = [];

    public $timestamps = false;
}
