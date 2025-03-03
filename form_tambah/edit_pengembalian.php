<?php
// Sertakan file koneksi
require_once '../koneksi.php';

// Cek apakah ada ID yang dikirim melalui URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data pengembalian berdasarkan ID
    $query = "SELECT id, nama, nama_buku, tanggal_kembali, status FROM pengembalian WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Cek apakah data ditemukan
    if ($row = mysqli_fetch_assoc($result)) {
        $nama = $row['nama'];
        $nama_buku = $row['nama_buku'];
        $tanggal_kembali = $row['tanggal_kembali'];
        $status = $row['status'];
    } else {
        echo "<script>alert('Data pengembalian tidak ditemukan!'); window.location.href='../pengembalian.php';</script>";
    }
} else {
    echo "<script>alert('ID pengembalian tidak ditemukan!'); window.location.href='../pengembalian.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengembalian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="fw-bold text-center">Edit Pengembalian Buku</h2>
        <div class="card shadow p-4 mt-4">
            <form action="../proses/proses_edit_pengembalian.php" method="POST">
                <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($nama); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Buku</label>
                    <input type="text" name="nama_buku" class="form-control" value="<?= htmlspecialchars($nama_buku); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="<?= htmlspecialchars($tanggal_kembali); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Dikembalikan" <?= ($status == 'Dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
                        <option value="Dipinjam" <?= ($status == 'Dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="../pengembalian.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
