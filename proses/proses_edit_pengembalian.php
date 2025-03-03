<?php
// Sertakan file koneksi
require_once '../koneksi.php';

// Cek apakah form dikirimkan dengan metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nama_buku = $_POST['nama_buku'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    // Query untuk mengupdate data pengembalian
    $query = "UPDATE pengembalian SET nama = ?, nama_buku = ?, tanggal_kembali = ?, status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $nama_buku, $tanggal_kembali, $status, $id);

    // Eksekusi query dan cek apakah update berhasil
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data pengembalian berhasil diperbarui!'); window.location.href='../pengembalian.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data pengembalian!'); window.location.href='../form_tambah/edit_pengembalian.php?id=$id';</script>";
    }
}
?>
