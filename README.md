# SIPAY - Sistem Informasi Pembayaran SPP

SIPAY adalah aplikasi berbasis web yang dirancang untuk mengelola administrasi pembayaran SPP sekolah secara digital, efisien, dan transparan. Proyek ini dikembangkan sebagai bagian dari Tugas Project Based Learning (PjBL) Kompetensi Keahlian Pengembangan Perangkat Lunak dan Gim (PPLG) di **SMK Negeri 7 Baleendah**.

Aplikasi ini menggunakan arsitektur Modern MVC dengan Laravel, mendukung otentikasi multi-role berbasis multi-guard (Admin, Petugas, dan Siswa), serta dirancang sepenuhnya menggunakan Docker untuk standarisasi lingkungan pengembangan.

---

## 🚀 Fitur Utama (Sprint 1 & 2)

- **Multi-Role Authentication (Multi-Guard):** Menggunakan pintu masuk terpisah untuk tabel `petugas` (Level: Admin & Petugas) dan tabel `siswa` (menggunakan komponen `nisn` sebagai identitas unik).
- **Dashboard Statistik Dinamis:** Tampilan ringkasan data operasional (Total Siswa, Total Petugas, Total Kelas) dengan antarmuka modern berbasis TailwindCSS.
- **Responsive Layout & Sidebar Active State:** Sistem template induk (*Master Layout*) yang fleksibel sesuai dengan standar desain mockup Figma.
- **Dockerized Environment:** Konfigurasi kontainerisasi instan yang mendukung SELinux (*shared volume labels*) untuk kelancaran pengembangan di sistem operasi Linux/Fedora.

---

## 🛠️ Tech Stack

- **Framework:** Laravel 12.x
- **Bahasa Pemrograman:** PHP 8.2
- **Database:** MySQL
- **Desain & Styling:** TailwindCSS & Vite
- **Kontainerisasi:** Docker & Docker Compose
- **Version Control:** Git & GitHub

---

## 👥 Anggota Tim Pengembangan (SYNTRA)

Proyek ini dibangun secara kolaboratif oleh kelompok **SYNTRA** Kelas XI PPLG SMK Negeri 7 Baleendah:

| Nama Anggota | Peran / Deskripsi Tugas | Kontribusi Teknis |
| :--- | :--- | :--- |
| **Sofyan Eka Febriyanto** | Project Manager & Backend Engineer | - Arsitektur Multi-Guard Auth & Multi-Role<br>- Dockerization & Konfigurasi Lingkungan Sistem<br>- Manajemen Repositori Git & Integrasi Konflik |
| **Najla** | Database Designer & Frontend Developer | - Perancangan Skema Migrasi Database & Seeder Data<br>- Slicing UI Form Login & Dashboard Utama<br>- Implementasi Layout Kustom Blade |

---

## ⚙️ Panduan Instalasi Lokal (Docker)

Ikuti langkah-langkah berikut untuk menjalankan proyek SIPAY di komputer lokal:

### 1. Clone Repositori
```bash
git clone [https://github.com/SofyanEkaFebriyanto/sipay.git](https://github.com/SofyanEkaFebriyanto/sipay.git)
cd sipay
```

### 2. Konfigurasi Environment File
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
*Catatan:* Jika mengalami kendala pada tabel `sessions` MySQL, pastikan driver session diubah menjadi file di dalam `.env`:
```env
SESSION_DRIVER=file
```

### 3. Nyalakan Kontainer Docker
Jalankan Docker Compose untuk membangun dan menyalakan server aplikasi dan database secara terisolasi:
```bash
docker compose up -d
```

### 4. Instal Dependensi Composer
Unduh seluruh library vendor Laravel di dalam kontainer aplikasi:
```bash
docker exec -it sipay_app composer install
```

### 5. Generate Aplikasi Key
```bash
docker exec -it sipay_app php artisan key:generate
```

### 6. Eksekusi Migrasi & Seeder Database
Buat seluruh struktur tabel administrasi SPP dan suntikkan data akun uji coba default:
```bash
docker exec -it sipay_app php artisan migrate:fresh --seed
```

Aplikasi sekarang sudah dapat diakses melalui browser pada URL: **`http://localhost:8000`**

---

## 🔑 Akun Uji Coba Default
Setelah berhasil melakukan seeder, gunakan akun simulasi berikut untuk masuk:
- **Admin:** Username: `admin` | Password: `123`
- **Petugas:** Username: `petugas` | Password: `123`
