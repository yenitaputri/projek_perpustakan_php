<?php
// Sertakan file koneksi
require_once 'koneksi.php';

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Ambil data pengembalian dari tabel pengembalian langsung
$query = "SELECT nama, nama_buku, tanggal_kembali, status FROM pengembalian WHERE status = 'Dikembalikan'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengembalian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
    if (isset($_SESSION['success'])) {
        echo "<script>alert('" . $_SESSION['success'] . "');</script>";
        unset($_SESSION['success']);
    } elseif (isset($_SESSION['error'])) {
        echo "<script>alert('" . $_SESSION['error'] . "');</script>";
        unset($_SESSION['error']);
    }
    ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img class="navbar-brand" src="plugins/img/th.jpeg" style="width: 80px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
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
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <h2 class="display-6 fw-bold">Data Pengembalian Buku</h2>
        <button class="btn btn-primary btn-lg mt-3" onclick="window.location.href='form_tambah/formpengembalian.php'">Tambah Pengembalian</button>
        <div class="card shadow p-4 mt-4">
            <table class="table table-striped table-hover">
            <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Buku</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['nama_buku']; ?></td>
                            <td><?= $row['tanggal_kembali']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td>
                            <a href="form_tambah/edit_pengembalian.php?id=<?= $no - 1; ?>" 
                                class="btn btn-warning btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?');">
                                Edit
                            </a>
                            <a href="proses/proses_delete_pengembalian.php?id=<?= $no - 1; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
