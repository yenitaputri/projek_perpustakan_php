<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Buku</title>
</head>

<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("location: index.php");
    exit;
}

$id = $_GET['id'];

// Query untuk mendapatkan detail buku berdasarkan id
$sql = "SELECT * FROM buku WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$buku = $result->fetch_assoc();

if (!$buku) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Buku tidak ditemukan!</div></div>";
    exit;
}

// Pastikan path cover buku ada dan valid
$cover_buku = !empty($buku['cover_buku']) ? $buku['cover_buku'] : 'default_cover.jpg';
?>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img class="navbar-brand" src="plugins/img/th.jpeg" style="width: 80px;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" href="buku.php">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="anggota.php">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="peminjaman.php">Peminjaman Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="pengembalian.php">Pengembalian Buku</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="p-3 bg-body-tertiary rounded-3">
            <h1 class="display-6 fw-bold">Detail Buku - <?= htmlspecialchars($buku['nama_buku']) ?></h1>
        </div>

        <div class="album py-2 bg-body-tertiary">
            <div class="card shadow-sm">
                <div class="row featurette">
                    <div class="col-md-4">
                        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" 
                             width="500" height="500" 
                             src="uploads/<?= htmlspecialchars($cover_buku) ?>" 
                             alt="Cover Buku">
                    </div>
                    <div class="col-md-6">
                        <p class="fs-5 fw-semibold text-primary mb-0">Judul Buku</p>
                        <h5><?= htmlspecialchars($buku['nama_buku']) ?></h5>
                        <hr>

                        <p class="fs-5 fw-semibold text-primary mb-0">Sinopsis Buku</p>
                        <textarea class="form-control" rows="5" readonly><?= htmlspecialchars($buku['sinopsis']) ?></textarea>
                        <hr>


                        <p class="fs-5 fw-semibold text-primary mb-0">Penulis</p>
                        <p><?= htmlspecialchars($buku['penulis']) ?></p>
                        <hr>

                        <p class="fs-5 fw-semibold text-primary mb-0">Penerbit</p>
                        <p><?= htmlspecialchars($buku['penerbit']) ?></p>

                        <p class="fs-5 fw-semibold text-primary mb-0">Tahun Terbit</p>
                        <p><?= htmlspecialchars($buku['tahun_terbit']) ?></p>
                        <a href="buku.php" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
