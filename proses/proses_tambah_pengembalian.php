<?php
// Sertakan file koneksi
require_once '../koneksi.php';

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari form
    $nama = trim($_POST['nama']);
    $nama_buku = trim($_POST['nama_buku']);
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = "Dikembalikan"; // Status pengembalian

    // Ambil id_peminjaman berdasarkan nama dan nama_buku yang sesuai di tabel peminjaman
    $cek_peminjaman = "SELECT id FROM peminjaman WHERE nama = ? AND nama_buku = ? ORDER BY id DESC LIMIT 1";
    $stmt_cek = mysqli_prepare($conn, $cek_peminjaman);
    mysqli_stmt_bind_param($stmt_cek, "ss", $nama, $nama_buku);
    mysqli_stmt_execute($stmt_cek);
    mysqli_stmt_store_result($stmt_cek);
    mysqli_stmt_bind_result($stmt_cek, $id_peminjaman);
    mysqli_stmt_fetch($stmt_cek);
    
    if (mysqli_stmt_num_rows($stmt_cek) == 0) {
        echo "<script>alert('Peminjaman tidak ditemukan!'); window.history.back();</script>";
        exit();
    }
    
    // Query untuk menambahkan data pengembalian
    $query = "INSERT INTO pengembalian (id_peminjaman, nama, nama_buku, tanggal_kembali, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "issss", $id_peminjaman, $nama, $nama_buku, $tanggal_kembali, $status);
    
    // Eksekusi query dan periksa hasilnya
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data pengembalian berhasil ditambahkan!'); window.location.href='../pengembalian.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data pengembalian!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Akses tidak diizinkan!'); window.location.href='../pengembalian.php';</script>";
}
?>