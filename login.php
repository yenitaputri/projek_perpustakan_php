<?php
session_start();
include 'koneksi.php'; // File koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password']; // Tanpa enkripsi

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['email'] = $user['email'];

        // Redirect ke halaman beranda
        header("Location: index.php");
        exit();
    } else {
        $error = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        <div class="text-center">
        <img class="navbar-brand" src="plugins/img/th.jpeg" style="width: 100px;"></img>
            <h3 class="mt-2">Perpustakaan Digital</h3>
        </div>
        <?php if (isset($error)) { echo "<div class='alert alert-danger mt-3'>$error</div>"; } ?>
        <form method="POST">
            <table class="table table-borderless mt-3">
                <tr>
                    <td><label for="email" class="form-label">Email</label></td>
                    <td><input type="email" class="form-control" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="password" class="form-label">Password</label></td>
                    <td><input type="password" class="form-control" name="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

