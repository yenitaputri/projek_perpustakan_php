<?php
$conn = new mysqli('localhost', 'root', '', 'db_perpus');
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ID peminjaman tersedia di URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID peminjaman tidak valid!";
    exit;
}

$id = $_GET['id'];

// Ambil data peminjaman berdasarkan ID
$sql = "SELECT * FROM peminjaman WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

// Ambil daftar buku untuk dropdown
$sql_buku = "SELECT nama_buku FROM buku";
$result_buku = $conn->query($sql_buku);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Peminjaman</title>
</head>
<body>

    <div class="container py-5">
        <h1 class="display-6 fw-bold">Edit Peminjaman Buku</h1>
        <form action="../proses/proses_edit_pinjam.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" 
                    value="<?php echo htmlspecialchars($data['nama']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Pilih Buku</label>
                <select class="form-control" id="nama_buku" name="nama_buku" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php while ($row = $result_buku->fetch_assoc()) { ?>
                        <option value="<?php echo htmlspecialchars($row['nama_buku']); ?>" 
                            <?php if ($data['nama_buku'] == $row['nama_buku']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($row['nama_buku']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" 
                    value="<?php echo htmlspecialchars($data['tanggal_pinjam']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" 
                    value="<?php echo htmlspecialchars($data['tanggal_kembali']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="Dipinjam" <?php if ($data['status'] == 'Dipinjam') echo 'selected'; ?>>Dipinjam</option>
                    <option value="Dikembalikan" <?php if ($data['status'] == 'Dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="../peminjaman.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
