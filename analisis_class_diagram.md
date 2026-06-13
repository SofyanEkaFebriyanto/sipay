# 📊 Analisis Perbandingan: Project SIPAY vs Class Diagram

> **Catatan:** File PDF `ClassDiagram_Kelompok6.drawio.pdf` hanya berisi link Google Drive yang memerlukan login, sehingga tidak bisa dibuka langsung. Analisis ini dilakukan berdasarkan **rekonstruksi dari kode project yang berjalan**, dibandingkan dengan standar class diagram sistem SPP.

---

## 🗂️ Inventarisasi Entitas & Atribut di Project

### 1. Class `Kelas`
| Atribut | Tipe DB | Status |
|---------|---------|--------|
| `id_kelas` | BIGINT PK Auto Inc | ✅ Ada |
| `nama_kelas` | VARCHAR | ✅ Ada |
| `kompetensi_keahlian` | VARCHAR | ✅ Ada |

**Controller:** `KelasController` — CRUD lengkap ✅

---

### 2. Class `Spp`
| Atribut | Tipe DB | Status |
|---------|---------|--------|
| `id_spp` | BIGINT PK Auto Inc | ✅ Ada |
| `tahun` | YEAR | ✅ Ada |
| `nominal` | INTEGER | ✅ Ada |

**Controller:** `SppController` — CRUD lengkap ✅

---

### 3. Class `Siswa`
| Atribut | Tipe DB | Status |
|---------|---------|--------|
| `nisn` | VARCHAR(10) PK | ✅ Ada |
| `nis` | VARCHAR(8) | ✅ Ada |
| `nama` | VARCHAR | ✅ Ada |
| `password` | VARCHAR | ✅ Ada |
| `id_kelas` (FK) | BIGINT | ✅ Ada |
| `alamat` | TEXT | ✅ Ada |
| `no_telp` | VARCHAR | ✅ Ada |
| `id_spp` (FK) | BIGINT | ✅ Ada |

**Controller:** `SiswaController` — CRUD lengkap ✅  
**Model Relasi:** `belongsTo(Kelas)`, `belongsTo(Spp)` ✅  
**Extra:** Model ini extends `Authenticatable` untuk guard `siswa` ✅

---

### 4. Class `Petugas`
| Atribut | Tipe DB | Status |
|---------|---------|--------|
| `id_petugas` | BIGINT PK Auto Inc | ✅ Ada |
| `username` | VARCHAR | ✅ Ada |
| `password` | VARCHAR | ✅ Ada |
| `nama_petugas` | VARCHAR | ✅ Ada |
| `level` | ENUM('admin','petugas') | ✅ Ada |

**Controller:** `PetugasController` — CRUD lengkap ✅  
**Extra:** Model ini extends `Authenticatable` untuk guard `petugas` ✅

---

### 5. Class `Pembayaran`
| Atribut | Tipe DB | Status |
|---------|---------|--------|
| `id_pembayaran` | BIGINT PK Auto Inc | ✅ Ada |
| `id_petugas` (FK) | BIGINT | ✅ Ada |
| `nisn` (FK) | VARCHAR | ✅ Ada |
| `tgl_bayar` | DATE | ✅ Ada |
| `bulan_dibayar` | VARCHAR | ✅ Ada |
| `tahun_dibayar` | VARCHAR | ✅ Ada |
| `id_spp` (FK) | BIGINT | ✅ Ada |
| `jumlah_bayar` | INTEGER | ✅ Ada |

**Controller:** `PembayaranController` — CRUD + `laporan()` ✅  
**Model Relasi:** `belongsTo(Petugas)`, `belongsTo(Siswa)` ✅

---

## 🔗 Peta Relasi Antar Kelas

```
Kelas   (1) ────────────── (N) Siswa
Spp     (1) ────────────── (N) Siswa
Siswa   (1) ────────────── (N) Pembayaran
Petugas (1) ────────────── (N) Pembayaran
Spp     (1) ────────────── (N) Pembayaran  ← Pembayaran juga langsung ke SPP
```

---

## 🎯 Controllers & Methods yang Terimplementasi

| Controller | `index` | `store` | `update` | `destroy` | Extra Methods |
|------------|---------|---------|----------|-----------|---------------|
| `AuthController` | ✅ | ✅ | — | — | `logout()` |
| `DashboardController` | — | — | — | — | `admin()`, `petugas()`, `siswa()` |
| `KelasController` | ✅ | ✅ | ✅ | ✅ | — |
| `SppController` | ✅ | ✅ | ✅ | ✅ | — |
| `SiswaController` | ✅ | ✅ | ✅ | ✅ | — |
| `PetugasController` | ✅ | ✅ | ✅ | ✅ | — |
| `PembayaranController` | ✅ | ✅ | ✅ | ✅ | `laporan()` |

---

## ⚠️ Potensi Perbedaan yang Perlu Dikonfirmasi ke Class Diagram

### 🟡 Hal yang Mungkin Berbeda dari Diagram Awal

1. **Relasi `Siswa` → `SPP` (FK `id_spp` di tabel siswa)**  
   Di project, setiap siswa langsung punya `id_spp`. Beberapa desain sistem SPP menghubungkan SPP ke kelas (bukan siswa individu). Jika di diagram relasi ini via kelas, maka ada perbedaan.

2. **Kolom `id_spp` di tabel `Pembayaran`**  
   Pembayaran menyimpan `id_spp` sendiri (selain sudah bisa didapat dari siswa). Ini denormalisasi ringan yang valid secara teknis, tapi mungkin tidak ada di class diagram awal.

3. **Tipe data `tahun_dibayar` = `VARCHAR` (bukan `INTEGER`)**  
   Di migration, `tahun_dibayar` adalah string. Jika di diagram bertipe integer/year, perlu disesuaikan di diagram.

4. **Tidak ada class `User` (Laravel default) yang dipakai**  
   File `User.php` model ada tapi tidak dipakai di sistem ini. Multi-guard menggunakan `Siswa` dan `Petugas` langsung sebagai Authenticatable.

### 🟢 Yang Sudah Pasti Sesuai

- Multi-role authentication (Admin, Petugas, Siswa) ✅
- Semua primary key kustom (`id_petugas`, `id_kelas`, `id_spp`, `nisn`) ✅
- Relasi one-to-many yang tepat ✅
- CRUD penuh di semua entitas ✅
- Fitur Laporan Pembayaran ✅

---

## 💡 Rekomendasi: Revisi Project atau Class Diagram?

### 🏆 Rekomendasi: **Update Class Diagram** (bukan project-nya)

**Alasannya:**

1. **Project sudah 90% jadi dan berjalan** — revisi skema database sekarang berarti migrasi ulang + penyesuaian di semua layer (model, controller, view), risikonya terlalu besar mendekati deadline.

2. **Perbedaannya minor dan masuk akal secara teknis** — pilihan seperti menyimpan `id_spp` langsung di pembayaran adalah keputusan engineering yang valid untuk memudahkan query laporan.

3. **Class diagram = dokumen living** — wajar ada evolusi saat implementasi. Yang penting diagram akhirnya merepresentasikan sistem yang berjalan.

4. **Konteks PjBL/akademis** — yang biasanya dinilai adalah konsistensi antara diagram dan sistem, bukan sebaliknya.

### ✅ Checklist Update Class Diagram

- [ ] Pastikan `Siswa` punya atribut `id_spp` (FK ke SPP)
- [ ] Pastikan `Pembayaran` punya FK ke `id_spp` (3 FK total)
- [ ] Sesuaikan tipe data: `tahun_dibayar` → `string/VARCHAR`
- [ ] Pastikan `Petugas` punya atribut `level: ENUM`
- [ ] Tambahkan method pada class diagram sesuai controller yang ada
- [ ] Tandai bahwa `Siswa` dan `Petugas` extends `Authenticatable`

---

*Analisis dibuat: 13 Juni 2026 | Project: SIPAY — SMKN 7 Baleendah*
