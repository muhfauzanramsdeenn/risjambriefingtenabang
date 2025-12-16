<?php
session_start();
include 'koneksi.php';

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = isset($_POST['username']) ? mysqli_real_escape_string($koneksi, trim($_POST['username'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (!empty($username) && !empty($password)) {
        // Cari user berdasarkan username
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $query = mysqli_query($koneksi, $sql);

        if ($query && mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
     // Perbandingan langsung (Plain Text) untuk password 'admin'
            if (md5($password, TRUE)) {
				// nama username
				$_SESSION['user'] = $admin['username'];
				$_SESSION['login'] = TRUE;
				$_SESSION['role'] = 'admin';
                
                // Pindahkan ke halaman utama
                header("Location: daftar_rapat.php");
                exit();
            }
        }
    }
    // Jika login gagal atau data kosong
    $error = true;
}
?>
<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;

        /* BACKGROUND MASJID */
        background-image: url('https://muslimahdaily.com/images/k2/4739b6c64144f72975550c5e8df1b948.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    /* OVERLAY GELAP */
    body::before {
        content: "";
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        z-index: -1;
    }

    .top-bar {
        background-color: #006650;
        color: white;
        padding: 10px 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .main-header {
        background-color: rgba(0, 128, 96, 0.95);
        color: white;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .login-container {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0;
    }

    .login-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        width: 100%;
        max-width: 400px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(4px);
    }

    .btn-custom {
        background-color: #008060;
        color: white;
        border: none;
    }

    .btn-custom:hover {
        background-color: #006650;
        color: white;
    }

    .main-footer {
        background-color: rgba(0, 102, 80, 0.95);
        color: rgba(255,255,255,0.8);
        padding: 20px;
        font-size: 12px;
        margin-top: auto;
    }

    .x-small {
        font-size: 10px;
    }
</style>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Masjid Jami Al Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png">
    <style>
        body { background-color: #f8f9fa; min-height: 100vh; display: flex; flex-direction: column; }
        .top-bar { background-color: #006650; color: white; padding: 10px 20px; font-size: 12px; font-weight: bold; }
        .main-header { background-color: #008060; color: white; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .login-container { flex: 1; display: flex; align-items: center; justify-content: center; padding: 40px 0; }
        .login-card { border: none; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; background: white; }
        .btn-custom { background-color: #008060; color: white; border: none; }
        .btn-custom:hover { background-color: #006650; color: white; }
        .main-footer { background-color: #006650; color: rgba(255,255,255,0.8); padding: 20px; font-size: 12px; margin-top: auto; }
        .x-small { font-size: 10px; }
    </style>
</head>
<body>

    <div class="top-bar">APLIKASI ABSENSI RAPAT</div>
    <div class="main-header">
        <div class="container d-flex align-items-center">
            <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" width="50" class="me-3 bg-white rounded-circle p-1">
            <div>
                <h4 class="mb-0 fw-bold">Masjid Jami Al Makmur Tanah Abang</h4>
                <p class="mb-0 small text-uppercase">Jl. KH. Mas Mansyur No. 6, Jakarta Pusat</p>
            </div>
        </div>
    </div>

    <div class="login-container">
        <div class="card login-card p-4 mx-3">
            <div class="text-center mb-4">
                  <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" width="60" class="mb-2">
                <h4 class="fw-bold" style="color: #008060;">Login Admin</h4>
                <p class="text-muted small">Silakan masuk untuk mengelola data</p>
            </div>

            <?php if($error): ?>
                <div class="alert alert-danger p-2 small text-center">Username atau Password salah!</div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label small fw-bold">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                <button type="submit" name="login" class="btn btn-custom w-100 fw-bold py-2 shadow-sm">Masuk</button>
            </form>
        </div>
    </div>

    <footer class="main-footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0 fw-bold">Masjid Jami' Al Makmur</p>
                    <p class="mb-0 x-small">Jl. KH Mas Mansyur No 6, Tanah Abang, Jakarta Pusat</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0 fw-bold">&copy; 2025 Aplikasi Absensi Rapat Digital</p>
                    <p class="mb-0 x-small">Masjid Jami Al Makmur Tanah Abang</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>