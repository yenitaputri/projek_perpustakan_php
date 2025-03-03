<?php
session_start();
include '../koneksi.php';

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

$nama_anggota = $_POST['nama'];
$nama_buku = $_POST['nama_buku'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$status = $_POST['status'];
$today = date("Y-m-d");

if (empty($nama_anggota) || empty($nama_buku) || empty($tanggal_pinjam) || empty($tanggal_kembali) || empty($status)) {
    $_SESSION['error'] = "Semua field harus diisi!";
    header("Location: ../form_tambah/formpeminjam.php");
    exit;
}

if ($tanggal_pinjam < $today) {
    $_SESSION['error'] = "Tanggal pinjam tidak boleh sebelum hari ini!";
    header("Location: ../form_tambah/formpeminjam.php");
    exit;
}

if ($tanggal_kembali <= $tanggal_pinjam) {
    $_SESSION['error'] = "Tanggal kembali harus setelah tanggal pinjam!";
    header("Location: ../form_tambah/formpeminjam.php");
    exit;
}

$query = "SELECT id FROM anggota WHERE nama = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $nama_anggota);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    $_SESSION['error'] = "Anggota tidak ditemukan!";
    header("Location: ../form_tambah/formpeminjam.php");
    exit;
}
$id_anggota = $data['id'];

$sql = "INSERT INTO peminjaman (id_anggota, nama, nama_buku, tanggal_pinjam, tanggal_kembali, status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssss", $id_anggota, $nama_anggota, $nama_buku, $tanggal_pinjam, $tanggal_kembali, $status);

if ($stmt->execute()) {
    $_SESSION['success'] = "Peminjaman berhasil ditambahkan!";
    header("Location: ../peminjaman.php");
} else {
    $_SESSION['error'] = "Terjadi kesalahan: " . $stmt->error;
    header("Location: ../form_tambah/formpeminjam.php");
}

$stmt->close();
$conn->close();
?>