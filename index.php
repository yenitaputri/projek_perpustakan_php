<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Jika belum login, redirect ke login.php
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Perpustakaan DIGITAL</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img class="navbar-brand" src="plugins/img/th.jpeg" style="width: 70px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="buku.php">Buku</a></li>
                <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
                <li class="nav-item"><a class="nav-link" href="peminjaman.php">Peminjaman Buku</a></li>
                <li class="nav-item"><a class="nav-link" href="pengembalian.php">Pengembalian Buku</a></li>     
            </ul>
            <!-- Menampilkan Email Pengguna & Tombol Logout -->
            <span class="navbar-text me-3">👤 <?php echo $_SESSION['email']; ?></span>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container">
    <main>
        <div class="b-example-divider"></div>

        <div class="container my-5 bg-dark text-secondary">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                    <h1 class="display-5 fw-bold text-white lh-1">Selamat Datang DI Perpustakaan DIGITAL, <?php echo $_SESSION['email']; ?>!</h1>
                    <p class="lead text-white">Buku Adalah Jendela Dunia.</p>
                </div>
                <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                    <img class="rounded-lg-3" src="plugins/img/th.jpeg" alt="" width="300">
                </div>
            </div>
        </div>

        <div class="b-example-divider"></div>

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2>Peminjaman</h2>
                    <p>Untuk mengelola peminjaman buku, klik tombol di bawah ini untuk melihat daftar peminjaman dan menambah data peminjaman baru.</p>
                    <a href="peminjaman.php" class="btn btn-outline-light">Lihat Peminjaman</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                    <h2>Pengembalian</h2>
                    <p>Untuk mengelola pengembalian buku, klik tombol di bawah ini untuk melihat daftar pengembalian buku yang dilakukan.</p>
                    <a href="pengembalian.php" class="btn btn-outline-secondary">Lihat Pengembalian</a>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>