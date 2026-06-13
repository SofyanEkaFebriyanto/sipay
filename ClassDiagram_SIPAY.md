# 📐 Class Diagram - SIPAY
## Sistem Informasi Pembayaran SPP | SMKN 7 Baleendah

---

## 🔷 Format Mermaid (bisa di-render di GitHub, Notion, dll.)

```mermaid
classDiagram
    direction TB

    class Kelas {
        %% PK tetap public karena diakses langsung di relasi/query
        +int id_kelas PK
        %% Attribute model -> protected (diakses via Eloquent $fillable)
        #string nama_kelas
        #string kompetensi_keahlian
        %% Method controller -> public (dipanggil Router)
        +index() View
        +store(request) Redirect
        +update(request, id) Redirect
        +destroy(id) Redirect
    }

    class Spp {
        +int id_spp PK
        #year tahun
        #int nominal
        +index() View
        +store(request) Redirect
        +update(request, id) Redirect
        +destroy(id) Redirect
    }

    class Siswa {
        <<extends Authenticatable>>
        %% PK & FK -> public
        +string nisn PK
        +int id_kelas FK
        +int id_spp FK
        %% Attribute biasa -> protected
        #string nis
        #string nama
        #text alamat
        #string no_telp
        %% Password -> private (sensitif, tidak boleh diakses langsung)
        -string password
        +index() View
        +store(request) Redirect
        +update(request, nisn) Redirect
        +destroy(nisn) Redirect
    }

    class Petugas {
        <<extends Authenticatable>>
        +int id_petugas PK
        #string username
        #string nama_petugas
        #enum level
        -string password
        +index() View
        +store(request) Redirect
        +update(request, id) Redirect
        +destroy(id) Redirect
    }

    class Pembayaran {
        +int id_pembayaran PK
        %% FK -> public
        +int id_petugas FK
        +string nisn FK
        +int id_spp FK
        %% Attribute transaksi -> protected
        #date tgl_bayar
        #string bulan_dibayar
        #string tahun_dibayar
        #int jumlah_bayar
        +index() View
        +store(request) Redirect
        +update(request, id) Redirect
        +destroy(id) Redirect
        +laporan() View
    }

    class AuthController {
        +index() View
        +login(request) Redirect
        +logout(request) Redirect
    }

    class DashboardController {
        +admin() View
        +petugas() View
        +siswa() View
        %% Private: hanya dipakai internal controller ini
        -getSummaryData() array
    }

    %% RELASI
    Kelas "1" --> "N" Siswa : id_kelas FK
    Spp "1" --> "N" Siswa : id_spp FK
    Siswa "1" --> "N" Pembayaran : nisn FK
    Petugas "1" --> "N" Pembayaran : id_petugas FK
    Spp "1" --> "N" Pembayaran : id_spp FK
```

---

## 📋 Deskripsi Relasi

| Dari | Ke | Tipe | FK |
|------|----|------|----|
| `Kelas` | `Siswa` | One-to-Many (1:N) | `id_kelas` |
| `Spp` | `Siswa` | One-to-Many (1:N) | `id_spp` |
| `Siswa` | `Pembayaran` | One-to-Many (1:N) | `nisn` |
| `Petugas` | `Pembayaran` | One-to-Many (1:N) | `id_petugas` |
| `Spp` | `Pembayaran` | One-to-Many (1:N) | `id_spp` |

---

## 📦 Ringkasan Class

| Class | PK | Auth Guard | Role |
|-------|----|-----------|------|
| `Kelas` | `id_kelas` | — | Master Data |
| `Spp` | `id_spp` | — | Master Data |
| `Siswa` | `nisn` (string) | `auth:siswa` | Entitas + Auth |
| `Petugas` | `id_petugas` | `auth:petugas` | Entitas + Auth |
| `Pembayaran` | `id_pembayaran` | — | Transaksi |
| `AuthController` | — | — | Controller Auth |
| `DashboardController` | — | — | Controller UI |

---

*Dibuat: 13 Juni 2026 | SIPAY v1.0 | Laravel 12 + Tailwind CSS v4*
