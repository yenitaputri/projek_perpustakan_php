<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Perpustakaan UMUM</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img class="navbar-brand" src="plugins/img/th.jpeg" style="width: 80px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="buku.php">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="anggota.php">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peminjaman.php">Peminjaman Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pengembalian.php">Pengembalian Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <main>
            <div class="container py-5">
                <div class="p-3 bg-body-tertiary rounded-3">
                    <div class="container-fluid">
                        <h1 class="display-6 fw-bold">Daftar Anggota Perpustakaan</h1>
                        <button class="btn btn-primary btn-lg mt-3" type="button" onclick="window.location.href='formanggota.php'">Tambah Anggota</button>
                    </div>
                </div>

                <!-- Table Anggota -->
                <div class="album py-5 bg-body-tertiary">
                    <div class="container">
                        <div class="card shadow p-4 mt-4">
                            <table class="table table-striped table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No HP</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Konfigurasi database
                                    $host = 'localhost';
                                    $username = 'root';
                                    $password = '';
                                    $dbname = 'db_perpus';

                                    // Membuat koneksi ke database
                                    $conn = new mysqli($host, $username, $password, $dbname);

                                    // Memeriksa koneksi
                                    if ($conn->connect_error) {
                                        die("Koneksi gagal: " . $conn->connect_error);
                                    }

                                    // Query untuk mengambil data anggota
                                    $sql = "SELECT * FROM anggota";
                                    $result = $conn->query($sql);

                                    // Memeriksa apakah ada hasil
                                    if ($result->num_rows > 0) {
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>
                                                <td>" . $no . "</td>
                                                <td>" . $row['nama'] . "</td>
                                                <td>" . $row['umur'] . "</td>
                                                <td>" . $row['alamat'] . "</td>
                                                <td>" . $row['no_hp'] . "</td>
                                                <td>
                                                    <a href='editanggota.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm' onclick='return confirmEdit(event, \"" . $row['id'] . "\")'>Edit</a>
                                                    <form action='proses_delete_anggota.php' method='post' style='display: inline;'>
                                                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                                                        <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus anggota ini?\")'>Delete</button>
                                                    </form>
                                                </td>
                                            </tr>";
                                            $no++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data anggota</td></tr>";
                                    }

                                    // Menutup koneksi
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script Alert Edit -->
    <script>
        function confirmEdit(event, id) {
            event.preventDefault(); // Mencegah langsung berpindah halaman
            let confirmation = confirm("Apakah Anda yakin ingin mengedit anggota ini?");
            if (confirmation) {
                window.location.href = "editanggota.php?id=" + id;
            }
        }
    </script>

    <?php
    if (isset($_GET['edit_success'])) {
        echo "<script>alert('Data anggota berhasil diperbarui!');</script>";
    } elseif (isset($_GET['edit_error'])) {
        echo "<script>alert('Gagal memperbarui data anggota!');</script>";
    }
    ?>
</body>

</html>
