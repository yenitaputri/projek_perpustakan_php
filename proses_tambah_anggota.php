<?php
// Konfigurasi database
$host = 'localhost';  // Ganti dengan host database Anda
$username = 'root';   // Ganti dengan username database Anda
$password = '';       // Ganti dengan password database Anda
$dbname = 'db_perpus'; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir tambah anggota
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$umur = $_POST['umur'];

// Query untuk menyimpan data anggota ke database
$sql = "INSERT INTO anggota (nama, alamat, no_hp, umur) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $nama, $alamat, $no_hp, $umur);

if ($stmt->execute()) {
    // Jika berhasil disimpan, kembali ke halaman anggota.php dengan parameter success
    header("Location: anggota.php?success=1");
    exit();
} else {
    // Jika gagal, kembali ke halaman anggota.php dengan parameter error
    header("Location: anggota.php?error=1");
    exit();
}

// Menutup statement dan koneksi
$stmt->close();
$conn->close();
?>
