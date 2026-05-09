<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Data SPP (Wajib ada karena foreign key di Siswa)
        DB::table('spp')->insert([
            'id_spp' => 1,
            'tahun' => 2024,
            'nominal' => 250000,
        ]);

        // 2. Seed Data Kelas (Wajib ada karena foreign key di Siswa)
        DB::table('kelas')->insert([
            'id_kelas' => 1,
            'nama_kelas' => 'XII RPL 1',
            'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak',
        ]);

        // 3. Seed Data Petugas (Admin & Petugas)
        DB::table('petugas')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'nama_petugas' => 'Administrator',
                'level' => 'admin',
            ],
            [
                'username' => 'petugas',
                'password' => Hash::make('petugas'),
                'nama_petugas' => 'Petugas SPP',
                'level' => 'petugas',
            ],
        ]);

        // 4. Seed Data Siswa
        DB::table('siswa')->insert([
            'nisn' => '123456789',
            'nis' => '88889999',
            'nama' => 'Siswa Test',
            'password' => Hash::make('123456789'),
            'id_kelas' => 1,
            'alamat' => 'Jl. Pendidikan No. 1',
            'no_telp' => '081234567890',
            'id_spp' => 1,
        ]);
    }
}
