Tentu, ini adalah draf file README.md yang bersih, profesional, dan fokus sepenuhnya pada teknis proyek Anda tanpa embel-embel kalimat khas AI. Silakan salin kode di bawah ini:

---

# Aplikasi Buku Tamu Digital

Aplikasi web sederhana berbasis PHP dan MySQL untuk mencatat data pengunjung. Proyek ini dibuat untuk memenuhi tugas praktikum mata kuliah Manajemen Basis Data / Pemrograman Web Dasar.

## Fitur Utama
*   Input Data Tamu: Form untuk mencatat nama, email, dan pesan pengunjung.
*   Keamanan Dasar: Dilengkapi dengan fungsi `htmlspecialchars` dan `strip_tags` untuk mencegah serangan XSS.
*   Tampilan Responsif: Menggunakan framework Bootstrap 5 agar nyaman diakses melalui perangkat mobile maupun desktop.
*   Daftar Pengunjung: Menampilkan data tamu secara real-time dari database yang diurutkan berdasarkan waktu terbaru.

## Persyaratan Sistem
*   PHP 7.4 atau versi yang lebih baru.
*   MySQL / MariaDB.
*   Web Server (XAMPP / Laragon / Apache).

## Struktur Folder
```text
WEB_DASAR/
├── index.php         # File utama aplikasi
├── image_f3cab4.png  # Asset gambar header
└── README.md         # Dokumentasi proyek
```

## Langkah Instalasi

1.  Persiapan Database:
    *   Buka phpMyAdmin dan buat database baru dengan nama `belajar_php`.
    *   Jalankan query SQL berikut untuk membuat tabel:
    ```sql
    CREATE TABLE tamu (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        pesan TEXT NOT NULL,
        waktu_input TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

2.  Konfigurasi File:
    *   Letakkan folder proyek di dalam direktori `htdocs` (XAMPP) atau `www` (Laragon).
    *   Pastikan file gambar dinamai sesuai dengan referensi di kode, yaitu `image_f3cab4.png`.

3.  Menjalankan Aplikasi:
    *   Aktifkan Apache dan MySQL pada control panel server Anda.
    *   Akses aplikasi melalui browser di alamat: `http://localhost/WEB_DASAR/index.php`.

## Catatan Teknis
*   Aplikasi ini menggunakan integrasi Bootstrap via CDN (memerlukan koneksi internet untuk memuat gaya).
*   Pastikan ekstensi `mysqli` sudah aktif pada konfigurasi PHP Anda.

---
Teknik Informatika
Universitas Muhammadiyah Sukabumi (UMMI)
2026
```