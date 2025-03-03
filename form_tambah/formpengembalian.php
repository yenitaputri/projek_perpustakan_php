<?php
// Sertakan file koneksi
require_once '../koneksi.php';

// Ambil data peminjam dari tabel peminjaman
$query_peminjam = "SELECT DISTINCT nama FROM peminjaman";
$result_peminjam = mysqli_query($conn, $query_peminjam);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    require_once '../koneksi.php';
    
    if ($_POST['action'] === 'get_buku' && isset($_POST['nama'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $query = "SELECT id, nama_buku FROM peminjaman WHERE nama = '$nama'";
        $result = mysqli_query($conn, $query);
        echo '<option value="">Pilih Buku</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['nama_buku'] . '" data-id="' . $row['id'] . '">' . $row['nama_buku'] . '</option>';
        }
        exit();
    }

    if ($_POST['action'] === 'get_tanggal' && isset($_POST['nama']) && isset($_POST['nama_buku'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $nama_buku = mysqli_real_escape_string($conn, $_POST['nama_buku']);
        
        $query = "SELECT tanggal_kembali FROM peminjaman WHERE nama = '$nama' AND nama_buku = '$nama_buku' LIMIT 1";
        $result = mysqli_query($conn, $query);
        
        if ($row = mysqli_fetch_assoc($result)) {
            echo $row['tanggal_kembali'];
        } else {
            echo ""; // Jangan kirim error, cukup kosongkan
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengembalian Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="fw-bold text-center">Form Pengembalian Buku</h2>
        <div class="card shadow p-4 mt-4">
        <form action="../proses/proses_tambah_pengembalian.php" method="POST">
            <input type="hidden" name="id_peminjaman" id="id_peminjaman">
            <div class="mb-3">
                <label class="form-label">Nama Peminjam</label>
                <select name="nama" id="nama" class="form-control" required onchange="loadBukuPeminjaman()">
                    <option value="">Pilih Peminjam</option>
                    <?php while ($row = mysqli_fetch_assoc($result_peminjam)) { ?>
                        <option value="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Buku</label>
                <select name="nama_buku" id="nama_buku" class="form-control" required onchange="loadTanggalKembali()">
                    <option value="">Pilih Buku</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Dikembalikan">Dikembalikan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Pengembalian</button>
            <a href="../pengembalian.php" class="btn btn-secondary">Kembali</a>
        </form>
        </div>
    </div>

    <script>
        function loadBukuPeminjaman() {
            var namaPeminjam = $("#nama").val();
            if (namaPeminjam) {
                $.ajax({
                    url: "",
                    method: "POST",
                    data: { action: "get_buku", nama: namaPeminjam },
                    success: function(response) {
                        console.log("Daftar Buku:", response);
                        $("#nama_buku").html(response);
                        $("#tanggal_kembali").val(""); // Reset tanggal kembali
                    }
                });
            } else {
                $("#nama_buku").html('<option value="">Pilih Buku</option>');
                $("#tanggal_kembali").val("");
            }
        }

        function loadTanggalKembali() {
            var namaPeminjam = $("#nama").val();
            var namaBuku = $("#nama_buku").val();
            if (namaPeminjam && namaBuku) {
                $.ajax({
                    url: "",
                    method: "POST",
                    data: { action: "get_tanggal", nama: namaPeminjam, nama_buku: namaBuku },
                    success: function(response) {
                        console.log("Tanggal Kembali:", response);
                        $("#tanggal_kembali").val(response.trim());
                    }
                });
            }
        }
    </script>
</body>
</html>
