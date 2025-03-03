<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Perpustakaan UMUM</title>
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
        <h1 class="display-6 fw-bold">Daftar Peminjaman Buku</h1>
        <button class="btn btn-primary btn-lg mt-3" onclick="window.location.href='form_tambah/formpeminjam.php'">Tambah Peminjaman</button>

        <div class="card shadow p-4 mt-4">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'db_perpus');
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM peminjaman ORDER BY id ASC";
                $result = $conn->query($sql);
                $no = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$no}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['nama_buku']}</td>
                            <td>{$row['tanggal_pinjam']}</td>
                            <td>{$row['tanggal_kembali']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='form_tambah/edit_peminjam.php?id={$row['id']}' class='btn btn-warning btn-sm' onclick=\"return confirmEdit()\">Edit</a>
                                <form action='proses/proses_delete_pinjam.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button type='submit' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?');\">Delete</button>
                                </form>
                            </td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Tidak ada data peminjaman</td></tr>";
                }
                $conn->close();
                ?>
                </tbody>
            </table>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $conn = new mysqli('localhost', 'root', '', 'db_perpus');

                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                $nama = $_POST['nama'];
                $nama_buku = $_POST['nama_buku'];
                $tanggal_pinjam = $_POST['tanggal_pinjam'];
                $tanggal_kembali = $_POST['tanggal_kembali'];
                $status = $_POST['status'];
                $today = date("Y-m-d");

                if ($tanggal_pinjam > $today) {
                    die("Error: Tanggal peminjaman tidak boleh lebih dari hari ini.");
                }
                if ($tanggal_kembali < $tanggal_pinjam) {
                    die("Error: Tanggal kembali tidak boleh lebih awal dari tanggal pinjam.");
                }

                $sql = "INSERT INTO peminjaman (nama, nama_buku, tanggal_pinjam, tanggal_kembali, status) 
                        VALUES ('$nama', '$nama_buku', '$tanggal_pinjam', '$tanggal_kembali', '$status')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Peminjaman berhasil!'); window.location.href='peminjaman.php';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmEdit() {
            return confirm("Apakah Anda yakin ingin mengedit data ini?");
        }
    </script>
</body>
</html>
