<p align="center">
    <img src="image.png" width="600" alt="SIPAY Logo">
</p>

# SIPAY - Sistem Informasi Pembayaran SPP

**SIPAY** adalah aplikasi berbasis web yang dirancang untuk mempermudah pengelolaan administrasi pembayaran SPP di sekolah. Aplikasi ini dibangun menggunakan framework **Laravel 11** dan **Tailwind CSS**, dengan fokus pada kemudahan penggunaan (*user-friendly*) dan efisiensi pencatatan transaksi.

## 🚀 Fitur Utama

- **Multi-Role Login**: Akses berbeda untuk Admin, Petugas, dan Siswa.
- **Manajemen Data Master**: CRUD lengkap untuk data Siswa, Kelas, SPP, dan Petugas.
- **Entry Transaksi Pintar**: Fitur *autofill* nominal pembayaran berdasarkan profil siswa untuk meminimalisir kesalahan input.
- **Histori Pembayaran**: Siswa dapat melihat riwayat pembayaran mereka secara langsung.
- **Laporan Cetak**: Fitur pembuatan laporan pembayaran SPP yang siap cetak (*print-friendly*).
- **UI Modern**: Desain antarmuka yang bersih dan responsif menggunakan Tailwind CSS.

## 👥 Peran Pengguna (Roles)

1.  **Admin**: Memiliki akses penuh ke seluruh fitur, termasuk manajemen data master, transaksi, dan laporan.
2.  **Petugas**: Fokus pada pengelolaan transaksi pembayaran dan melihat histori.
3.  **Siswa**: Dapat melihat profil diri dan riwayat pembayaran SPP yang telah dilakukan.

## 🛠️ Teknologi yang Digunakan

- **Framework**: [Laravel 11](https://laravel.com)
- **Styling**: [Tailwind CSS](https://tailwindcss.com)
- **Database**: MySQL
- **Icon & UI**: [Heroicons](https://heroicons.com)
- **Environment**: PHP 8.2+

## 📥 Instalasi Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

1.  **Clone Repository**
    ```bash
    git clone https://github.com/SofyanEkaFebriyanto/sipay.git
    cd sipay/src
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Migrasi Database**
    ```bash
    php artisan migrate
    ```

5.  **Jalankan Aplikasi**
    Buka dua terminal dan jalankan perintah berikut:
    ```bash
    # Terminal 1
    php artisan serve

    # Terminal 2
    npm run dev
    ```

## 📝 Lisensi

Proyek ini dibuat untuk tujuan pembelajaran dan pengembangan sistem informasi sekolah. Silakan gunakan dan modifikasi sesuai kebutuhan.

---
Dikembangkan dengan ❤️ oleh **Sofyan Eka Febriyanto**
