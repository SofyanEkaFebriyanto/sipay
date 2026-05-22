<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nisn' => '0000000001',
                'nama' => 'ABDUL REZA',
                'kelas' => 'XI RPL 1',
                'telepon' => '08123456789'
            ],
            [
                'nisn' => '0000000002',
                'nama' => 'BUDI SANTOSO',
                'kelas' => 'XI RPL 2',
                'telepon' => '08123456789'
            ],
            [
                'nisn' => '0000000003',
                'nama' => 'RIZQY FIRMAN',
                'kelas' => 'XI RPL 3',
                'telepon' => '08123456789'
            ],
        ];

        foreach ($data as $item) {
            Siswa::create($item);
        }
    }
}