<?php
// Konfigurasi Database
$host     = "localhost"; // Biasanya localhost
$username = "root";      // Default XAMPP adalah root
$password = "";          // Default XAMPP adalah kosong
$database = "belajar_php"; // Nama database yang kamu buat di phpMyAdmin

// Membuat Koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Cek Koneksi
if (!$conn) {
    // Jika gagal, hentikan program dan tampilkan pesan error
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Jika berhasil (Opsional: bisa dihapus jika sudah berfungsi)
// echo "Koneksi Berhasil!"; 
?>