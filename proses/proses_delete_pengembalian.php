<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'db_perpus');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ada ID yang diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data pengembalian berdasarkan ID
    $sql = "DELETE FROM pengembalian WHERE id = $id";

    // Eksekusi query dan cek hasilnya
    if ($conn->query($sql) === TRUE) {
        echo "Data pengembalian berhasil dihapus";
        header("Location: ../pengembalian.php"); // Redirect ke halaman pengembalian setelah sukses
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID pengembalian tidak ditemukan!";
}

// Menutup koneksi
$conn->close();
?>
