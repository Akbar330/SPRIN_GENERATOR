# 📄 SPRIN Generator

Aplikasi sederhana untuk menghasilkan **Surat Perintah (SPRIN)** secara otomatis dalam format **Word (.docx)**.  
Dibuat untuk mempermudah administrasi, terutama dalam pembuatan surat tugas yang berulang dengan format seragam.

## 🚀 Fitur Utama

- **Form Input Lengkap**: Input data SPRIN melalui form (Nomor, Kegiatan, Dasar, Tempat, Hari/Tanggal, Waktu)
- **Pelaksana Fleksibel**: Mendukung jumlah pelaksana yang dapat disesuaikan
  - 1–2 orang → otomatis masuk ke template standar
  - \>2 orang → otomatis dibuatkan tabel rapi
- **Format Otomatis**: Format tanggal & waktu otomatis terstandarisasi
- **Output Siap Cetak**: File hasil berupa `.docx` siap cetak dan distribusi
- **Nama File Aman**: Nama file otomatis aman (tanpa karakter ilegal)
- **Template Customizable**: Template bisa disesuaikan sesuai kebutuhan instansi

## 🛠️ Teknologi

- **PHP 8+**
- [PHPWord](https://phpoffice.github.io/PhpWord/) (TemplateProcessor)
- **HTML5 & CSS3** untuk tampilan form input responsif

## 📂 Struktur Project

```
/sprin-generator
├── /vendor/             # Dependencies PHPWord
├── index.php            # Form input SPRIN
├── generate.php         # Logika generate Word
├── template.docx        # Template standar
├── template_multi.docx  # Template tabel untuk >2 pelaksana
├── README.md
└── composer.json
```

## ⚙️ Cara Instalasi & Menjalankan

### 1. Clone Repository
```bash
git clone https://github.com/username/sprin-generator.git
cd sprin-generator
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Persiapan Template
Pastikan template Word tersedia:
- `template.docx` - Template untuk 1-2 pelaksana
- `template_multi.docx` - Template untuk >2 pelaksana

### 4. Jalankan Server
```bash
php -S localhost:8000
```

### 5. Akses Aplikasi
Buka di browser: `http://localhost:8000/index.php`

### 6. Cara Penggunaan
1. Isi form data SPRIN sesuai kebutuhan
2. Pilih jumlah pelaksana dan isi data masing-masing
3. Klik **Generate SPRIN**
4. File `SPRIN.docx` akan otomatis terunduh

## 📋 Persyaratan Sistem

- **PHP**: versi 8.0 atau lebih tinggi
- **Composer**: untuk manajemen dependencies
- **Web Server**: Apache, Nginx, atau PHP built-in server
- **Extensions**: php-zip, php-xml (biasanya sudah tersedia)

## 🔧 Konfigurasi

Template Word dapat disesuaikan dengan mengedit:
- `template.docx` - untuk format standar
- `template_multi.docx` - untuk format dengan tabel pelaksana

Gunakan placeholder berikut dalam template:
- `${nomor}` - Nomor SPRIN
- `${kegiatan}` - Nama kegiatan
- `${dasar}` - Dasar kegiatan
- `${tempat}` - Tempat pelaksanaan
- `${tanggal}` - Tanggal kegiatan
- `${waktu}` - Waktu pelaksanaan
- `${nama1}`, `${jabatan1}` - Data pelaksana

## 🤝 Kontributor

- **Akbar Jhon & Srulzz** – Developer Utama
- **Tim Administrasi & IT BNN** – Dukungan & Testing

## 📞 Dukungan

Untuk pertanyaan atau masalah teknis, silakan hubungi:
- Email: admin@bnn.go.id
- Website: [https://bnn.go.id](https://bnn.go.id)

---

## 📜 Lisensi

**Lisensi Badan Narkotika Nasional (BNN)**

Hak cipta © **Badan Narkotika Nasional Republik Indonesia dan GHDBH Squad**.

Lisensi ini mengikuti ketentuan **Badan Narkotika Nasional (BNN)**.

Semua penggunaan, distribusi, maupun modifikasi perangkat lunak ini **hanya diperbolehkan untuk kepentingan internal dan resmi instansi pemerintah Republik Indonesia**, khususnya dalam lingkup tugas BNN.

Penggunaan di luar kepentingan resmi instansi pemerintah **tidak diperkenankan tanpa izin tertulis dari BNN**.

**Ketentuan Penggunaan:**
- ✅ Penggunaan internal instansi pemerintah
- ✅ Modifikasi untuk keperluan dinas
- ❌ Penggunaan komersial tanpa izin
- ❌ Distribusi untuk kepentingan pribadi
- ❌ Penggunaan oleh pihak non-pemerintah tanpa izin resmi

Untuk informasi lebih lanjut mengenai lisensi, silakan hubungi Bagian Hukum dan Hubungan Masyarakat BNN.
