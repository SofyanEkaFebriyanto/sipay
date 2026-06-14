# 🎭 Naskah Presentasi Sidang 2 - Proyek SIPAY
> **Kelompok:** SYNTRA (XI PPLG-2)  
> **Aplikasi:** SIPAY (Sistem Informasi Pembayaran SPP)  
> **Tujuan:** Sidang Pertanggungjawaban Implementasi (Sidang 2)  
> **Waktu Estimasi:** 15 - 20 Menit  

---

## 📌 DAFTAR ISI SCRIPT
1. [Bagian 1: Pembukaan & Perkenalan Tim](#slide-1-pembukaan--perkenalan-tim)
2. [Bagian 2: Nama & Filosofi Tim (SYNTRA)](#slide-2-nama--filosofi-tim-syntra)
3. [Bagian 3: Identitas & Filosofi Aplikasi (SIPAY)](#slide-3-identitas--filosofi-aplikasi-sipay)
4. [Bagian 4: Laporan Hasil Revisi Sidang 1](#slide-4-laporan-hasil-revisi-sidang-1)
5. [Bagian 5: Keseluruhan Implementasi Teknis](#slide-5-keseluruhan-implementasi-teknis)
6. [Bagian 6: Alur Demonstrasi Aplikasi (Live Demo)](#slide-6-alur-demonstrasi-aplikasi-live-demo)
7. [Bagian 7: Kesimpulan & Penutup](#slide-7-kesimpulan--penutup)

---

### SLIDE 1: PEMBUKAAN & PERKENALAN TIM
**Pemandu Layar:** *Tampilkan Slide Judul dengan Logo SIPAY & Nama Tim SYNTRA.*

* **[Juru Bicara / Project Manager - Sofyan]:**  
  > "Assalamualaikum Wr. Wb.  
  > Selamat pagi/siang kepada Bapak dan Ibu Penguji Sidang PjBL yang kami hormati.  
  > Kami dari kelompok **SYNTRA** kelas XI PPLG-2, pada hari ini akan mempresentasikan hasil implementasi proyek PjBL kami yang berjudul **SIPAY: Sistem Informasi Pembayaran SPP**.  
  >   
  > Sebelum memulai, izinkan saya memperkenalkan anggota tim pengembang kami yang telah bekerja sama membangun sistem ini:  
  > 1. Saya sendiri, **Sofyan Eka Febriyanto**, selaku Project Manager & Backend Engineer.  
  > 2. Rekan saya **Najla**, sebagai Database Designer & Frontend Developer.  
  > 3. Rekan saya **Shabrina**, sebagai Frontend Engineer.  
  > 4. Dan rekan saya **Ival**, selaku Quality Assurance & System Tester.  
  >   
  > Mari kita masuk ke bagian pertama mengenai identitas tim kami."

---

### SLIDE 2: NAMA & FILOSOFI TIM (SYNTRA)
**Pemandu Layar:** *Tampilkan Logo SYNTRA beserta daftar nama anggota.*

* **[Presenter 2 - Najla / Anggota Lain]:**  
  > "Bapak dan Ibu Penguji, tim kami memilih nama **SYNTRA** sebagai identitas kolaborasi kami.   
  > **SYNTRA** merupakan singkatan dari **Syntax Transformers** (atau secara filosofis menggambarkan *Synergy & Transition*).  
  >   
  > **Alasan Memilih Nama Ini:**  
  > 1. **Syntax** (Sintaks) merepresentasikan fondasi kami sebagai programmer PPLG yang bergelut dengan baris kode program.  
  > 2. **Transformers** melambangkan kemampuan kami untuk mengubah baris kode program yang mentah menjadi sebuah sistem informasi yang siap pakai, bernilai guna, dan mempermudah pekerjaan manusia.  
  > 3. **Synergy** merepresentasikan kerja sama yang solid antar lini (PM, DB, Frontend, QA) guna menghasilkan produk yang optimal.  
  >   
  > Dengan nama SYNTRA, kami berkomitmen untuk selalu menghadirkan kode yang bersih, arsitektur yang kuat, dan solusi aplikasi yang fungsional."

---

### SLIDE 3: IDENTITAS & FILOSOFI APLIKASI (SIPAY)
**Pemandu Layar:** *Tampilkan screenshot halaman utama/login SIPAY dan logo aplikasi.*

* **[Presenter 3 - Shabrina / Anggota Lain]:**  
  > "Selanjutnya, kami akan menjelaskan mengenai produk yang kami bangun, yaitu **SIPAY**.  
  > **SIPAY** merupakan singkatan dari **Sistem Informasi Pembayaran SPP**.  
  >   
  > **Alasan Memilih Nama Ini:**  
  > 1. **Sederhana & Mudah Diingat (*Catchy*):** Kami ingin sebuah nama yang ketika didengar langsung membekas di ingatan pengguna. SIPAY terdengar ramah di telinga warga sekolah.  
  > 2. **Representasi Fungsi:** Gabungan dari kata *SI* (Sistem Informasi) dan *PAY* (Pembayaran/SPP) menunjukkan secara gamblang fokus aplikasi ini, yaitu mendigitalisasi transaksi SPP sekolah agar lebih praktis, aman, dan transparan.  
  > 3. **Menghilangkan Birokrasi Fisik:** Dengan nama SIPAY, kami membawa misi modernisasi pembayaran sekolah dari pencatatan kartu kertas ke sistem berbasis web cloud."

---

### SLIDE 4: LAPORAN HASIL REVISI SIDANG 1
**Pemandu Layar:** *Tampilkan tabel perbandingan/poin revisi sebelum dan sesudah.*

* **[Project Manager - Sofyan]:**  
  > "Pada Sidang 1 sebelumnya, kami menerima beberapa masukan berharga dari Bapak/Ibu penguji terkait perencanaan database, perancangan diagram, serta konsistensi desain UI. Berikut adalah laporan perbaikan yang telah kami selesaikan 100%:  
  >   
  > 1. **Penyempurnaan Struktur Relasi Database (Class Diagram):**  
  >    * *Sebelumnya:* Relasi SPP ke siswa terlalu berbelit.  
  >    * *Perbaikan:* Kami menambahkan Foreign Key `id_spp` langsung di dalam tabel `siswa` agar pelacakan tahun tarif SPP siswa menjadi lebih cepat dan presisi.  
  >    * *Sebelumnya:* Tabel pembayaran kurang optimal.  
  >    * *Perbaikan:* Kami mengintegrasikan 3 Foreign Key penting di tabel `pembayaran` (`id_petugas`, `nisn`, `id_spp`) demi mempercepat query pencarian histori transaksi.  
  > 2. **Koreksi Visibilitas Enkapsulasi OOP pada UML:**  
  >    * Kami memperbaiki notasi diagram kelas. Menggunakan tanda minus (`-`) untuk data sensitif seperti *password* (Private), tanda pagar (`#`) untuk atribut fillable Eloquent (Protected), dan tanda tambah (`+`) untuk method controller yang diakses luar/router (Public).  
  > 3. **Perbaikan Bug Login & Konflik Routing:**  
  >    * Kami membenahi susunan middleware auth pada web routing agar tidak terjadi tabrakan antara hak akses Dashboard Siswa dengan dashboard Petugas/Admin.  
  > 4. **Konsistensi Desain CRUD (Standardisasi Modal):**  
  >    * Sesuai masukan penguji, seluruh form CRUD (Siswa, SPP, Petugas) yang awalnya berpindah halaman kini sudah diseragamkan menggunakan **Modal Tailwind CSS** agar selaras dengan desain modul Kelas."

---

### SLIDE 5: KESELURUHAN IMPLEMENTASI TEKNIS
**Pemandu Layar:** *Tampilkan diagram arsitektur teknologi / Tech Stack.*

* **[Presenter 2 - Najla]:**  
  > "Untuk mewujudkan sistem yang solid, berikut adalah keseluruhan implementasi teknologi yang kami terapkan pada SIPAY:  
  >   
  > 1. **Framework Laravel 12 (Modern MVC):** Kami menggunakan rilis Laravel terbaru untuk memastikan performa yang cepat dan keamanan sistem yang tinggi.  
  > 2. **Multi-Guard Authentication:** Sistem login terpisah secara aman menggunakan guard database. Admin/Petugas login dengan `username`, sedangkan Siswa login menggunakan `nisn`.  
  > 3. **Dockerized Environment:** Aplikasi ini dibungkus menggunakan Docker Compose, sehingga proses deployment di server sekolah atau komputer lokal penguji dapat dilakukan secara instan tanpa konflik versi PHP/Database.  
  > 4. **Tailwind CSS v4 & Vite:** Desain UI modern dengan performa aset yang sangat cepat berkat teknologi bundling Vite.  
  > 5. **Simplifikasi Kode (Clean & Readable Code):** Khusus untuk kepentingan presentasi akademis, kami menyederhanakan penulisan kode backend (misalnya menggunakan array eksplisit dibanding `compact()`, menulis alur data baris per baris secara berurutan, dan meminimalisir sintaks *magic method* Laravel) agar logika aplikasi sangat mudah dipahami dan dijelaskan ketika diuji."

---

### SLIDE 6: ALUR DEMONSTRASI APLIKASI (LIVE DEMO)
**Pemandu Layar:** *Alihkan ke layar demo aplikasi SIPAY.*

* **[Project Manager - Sofyan / Tester - Ival]:**  
  > "Bapak dan Ibu Penguji, izinkan kami mendemonstrasikan sistem SIPAY secara langsung. Berikut skenario pengujiannya:  
  >   
  > 1. **Pengujian Login Multi-Role:**  
  >    * Pertama, kami masuk sebagai **Admin** menggunakan `username`. Terlihat halaman dashboard menampilkan statistik jumlah siswa, kelas, petugas, dan total transaksi SPP.  
  > 2. **Manajemen Master Data (CRUD via Modal):**  
  >    * Kita buka menu 'Siswa' atau 'SPP'. Ketika tombol 'Tambah Data' diklik, form muncul dalam bentuk Modal yang dinamis tanpa perlu reload halaman. Proses edit dan hapus data juga berjalan secara instan.  
  > 3. **Fitur Pintar Pembayaran (Smart-Autofill):**  
  >    * Kami beralih ke transaksi pembayaran SPP. Saat petugas memilih nama Siswa, sistem secara otomatis (*smart-autofill*) mendeteksi nominal SPP yang harus dibayarkan berdasarkan profil tahun siswa tersebut. Ini meminimalisir kesalahan input nominal oleh petugas.  
  > 4. **Cetak Laporan SPP:**  
  >    * Kita dapat memfilter data transaksi dan mengklik tombol 'Cetak Laporan' untuk menghasilkan dokumen rekap pembayaran siap cetak (*print-friendly format*).  
  > 5. **Dashboard Transparansi Siswa:**  
  >    * Terakhir, kami login sebagai **Siswa** menggunakan `nisn`. Di sini siswa hanya bisa melihat ringkasan profil mereka dan riwayat lengkap SPP yang sudah mereka bayarkan."

---

### SLIDE 7: KESIMPULAN & PENUTUP
**Pemandu Layar:** *Tampilkan slide penutup berisi teks "Terima Kasih" dan informasi kontak tim.*

* **[Project Manager - Sofyan]:**  
  > "Sebagai kesimpulan, **SIPAY** yang dikembangkan oleh tim **SYNTRA** telah sepenuhnya siap digunakan secara fungsional. Proyek ini membuktikan bahwa integrasi framework modern seperti Laravel 12 dengan metodologi dockerization mampu menghasilkan sistem informasi sekolah yang handal, cepat, dan rapi secara estetika kode.  
  >   
  > Kami mengucapkan terima kasih yang sebesar-besarnya kepada guru pembimbing dan rekan-rekan yang telah membantu kelancaran proyek ini.  
  >   
  > Demikian presentasi dari Kelompok SYNTRA. Sekarang, kami persilakan kepada Bapak dan Ibu Dewan Penguji untuk memberikan masukan, kritik, maupun pertanyaan pada sesi tanya jawab ini. Terima kasih.  
  > *Wassalamu'alaikum Wr. Wb.*"

---

## 💡 TIPS SUKSES SIDANG UNTUK TIM SYNTRA:
1. **Lakukan Simulasi:** Latih pembacaan naskah ini minimal 2 kali sebelum hari H agar tidak kaku saat membaca.
2. **Kuasai Kode Simplifikasi:** Karena kode di Controller sudah di-simplifikasi (tidak pakai `compact()` atau syntax berantai), kamu bisa dengan sangat mudah menjelaskan baris per baris kode jika ditanya penguji.
3. **Persiapkan Docker:** Pastikan docker container (`docker compose up -d`) sudah berjalan lancar sebelum masuk ke ruang sidang agar demo tidak tersendat.
