<?php
session_start();

// --- 1. KONEKSI DATABASE ---
$host     = "localhost";
$user     = "root";
$password = ""; 
$database = "belajar_php";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("<div class='alert alert-danger'>Koneksi Gagal: " . mysqli_connect_error() . "</div>");
}

// --- 2. PROSES INPUT DATA ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_simpan'])) {
    $nama  = htmlspecialchars(strip_tags(trim($_POST['nama'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $pesan = htmlspecialchars(strip_tags(trim($_POST['pesan'])));

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        // Query INSERT (Pastikan kolom waktu_input otomatis terisi oleh MySQL)
        $sql = "INSERT INTO tamu (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['msg'] = ["type" => "success", "text" => "Pesan berhasil terkirim!"];
        } else {
            $_SESSION['msg'] = ["type" => "danger", "text" => "Error: " . mysqli_error($conn)];
        }
    } else {
        $_SESSION['msg'] = ["type" => "warning", "text" => "Mohon isi semua kolom!"];
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital | Teknik Informatika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: sans-serif; }
        .main-card { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .hero-img { width: 100%; height: 300px; object-fit: cover; }
        .btn-dark-blue { background-color: #09395a; color: white; }
        .btn-dark-blue:hover { background-color: #1a8f9a; color: white; }
        .table-wrap { max-height: 400px; overflow-y: auto; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card main-card">
        <!-- HEADER GAMBAR -->
        <img src="image.jpeg" alt="Header" class="hero-img">
        
        <div class="card-body p-4 p-md-5">
            <h2 class="text-center mb-4 fw-bold" style="color: #09395a;">Buku Tamu Digital</h2>
            
            <div class="row g-5">
                <!-- FORM INPUT -->
                <div class="col-md-5">
                    <h5 class="fw-bold mb-3">Tinggalkan Pesan</h5>
                    
                    <?php if (isset($_SESSION['msg'])): ?>
                        <div class="alert alert-<?= $_SESSION['msg']['type'] ?> alert-dismissible fade show">
                            <?= $_SESSION['msg']['text'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <?php unset($_SESSION['msg']); ?>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea name="pesan" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="btn_simpan" class="btn btn-dark-blue w-100 fw-bold">Kirim</button>
                    </form>
                </div>

                <!-- TABEL DATA -->
                <div class="col-md-7">
                    <h5 class="fw-bold mb-3">Daftar Pengunjung</h5>
                    <div class="table-wrap">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Pesan</th>
                                    <th class="text-end">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($conn, "SELECT * FROM tamu ORDER BY id DESC");
                                while ($row = mysqli_fetch_assoc($res)): 
                                    // Solusi Error: Cek jika key ada dan tidak null
                                    $raw_date = isset($row['waktu_input']) ? $row['waktu_input'] : null;
                                    $display_date = ($raw_date) ? date('d/m H:i', strtotime($raw_date)) : '-';
                                ?>
                                    <tr>
                                        <td><strong><?= htmlspecialchars($row['nama']) ?></strong></td>
                                        <td class="text-muted italic small">"<?= htmlspecialchars($row['pesan']) ?>"</td>
                                        <td class="text-end small"><?= $display_date ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-center bg-white border-0 py-3">
            <p class="text-muted small mb-0">&copy; 2026 Teknik Informatika UMMI</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>