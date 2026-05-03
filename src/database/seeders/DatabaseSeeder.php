<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            'nama_kelas' => 'X RPL 1',
            'kompetensi_keahlian' => 'RPL'
        ]);

        DB::table('spp')->insert([
            'tahun' => 2026,
            'nominal' => 500000
        ]);

        DB::table('petugas')->insert([
            'username' => 'admin',
            'password' => bcrypt('123'),
            'nama_petugas' => 'Admin',
            'level' => 'admin'
        ]);

        DB::table('siswa')->insert([
            'nisn' => '1234567890',
            'nis' => '12345678',
            'nama' => 'Seng',
            'id_kelas' => 1,
            'alamat' => 'Bandung',
            'no_telp' => '08123456789',
            'id_spp' => 1
        ]);
    }
}