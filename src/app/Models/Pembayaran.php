<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = [];
    public $timestamps = false;

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn', 'nisn');
    }
}