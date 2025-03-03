<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Peminjaman Buku</title>
</head>
<body>
    <div class="container py-5">
        <h1 class="display-6 fw-bold">Form Peminjaman Buku</h1>
        <form action="../proses/proses_tambah_pinjam.php" method="post" onsubmit="return validateForm()">
            
            <!-- Dropdown Nama Anggota -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Anggota</label>
                <select class="form-control" id="nama" name="nama" required>
                    <option value="">-- Pilih Anggota --</option>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'db_perpus');
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }
                    $sql = "SELECT nama FROM anggota"; // Ambil nama anggota dari tabel anggota
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>

            <!-- Dropdown Pilih Buku -->
            <div class="mb-3">
                <label for="nama_buku" class="form-label">Pilih Buku</label>
                <select class="form-control" id="nama_buku" name="nama_buku" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'db_perpus');
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }
                    $sql = "SELECT nama_buku FROM buku";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['nama_buku'] . "'>" . $row['nama_buku'] . "</option>";
                    }
                    $conn->close();
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Dipinjam">Dipinjam</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="../peminjaman.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let today = new Date().toISOString().split('T')[0];
            let tanggalPinjamInput = document.getElementById("tanggal_pinjam");
            let tanggalKembaliInput = document.getElementById("tanggal_kembali");

            tanggalPinjamInput.setAttribute("min", today);
            tanggalKembaliInput.setAttribute("min", today);

            tanggalPinjamInput.addEventListener("change", function () {
                tanggalKembaliInput.setAttribute("min", this.value);
            });
        });

        function validateForm() {
            let tanggalPinjam = document.getElementById("tanggal_pinjam").value;
            let tanggalKembali = document.getElementById("tanggal_kembali").value;
            let today = new Date().toISOString().split('T')[0];

            if (tanggalPinjam < today) {
                alert("Tanggal peminjaman tidak boleh sebelum hari ini!");
                return false;
            }

            if (tanggalKembali <= tanggalPinjam) {
                alert("Tanggal kembali harus setelah tanggal peminjaman!");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
