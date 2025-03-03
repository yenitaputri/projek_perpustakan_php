<?php
$conn = new mysqli('localhost', 'root', '', 'db_perpus');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Debugging: Cek apakah data diterima
var_dump($_POST);

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nama_buku = $_POST['nama_buku'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
$status = $_POST['status'];

// Query update data
$sql = "UPDATE peminjaman SET 
        nama = ?, 
        nama_buku = ?, 
        tanggal_pinjam = ?, 
        tanggal_kembali = ?, 
        status = ? 
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $nama, $nama_buku, $tanggal_pinjam, $tanggal_kembali, $status, $id);

if ($stmt->execute()) {
    echo "Data berhasil diperbarui!"; // Debugging
    header("Location: ../peminjaman.php"); // Redirect ke halaman peminjaman
    exit();
} else {
    echo "Error: " . $stmt->error; // Debugging error query
}

$conn->close();
?>
