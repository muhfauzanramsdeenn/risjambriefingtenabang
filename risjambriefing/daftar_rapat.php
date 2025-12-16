<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rapat - Masjid Jami Al Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --masjid-green: #008060;
            --masjid-dark: #006650;
        }

        body {
            background-color: #f4f7f6;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Navigasi Full Width */
        .top-nav {
            background-color: var(--masjid-dark);
            color: white;
            padding: 10px 25px;
            width: 100%;
        }

        /* Header Branding Full Width */
        .main-header {
            background-color: var(--masjid-green);
            color: white;
            padding: 20px 25px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .logo-img {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            padding: 5px;
            object-fit: contain;
        }

        .content-section {
            flex: 1;
            padding: 30px 25px;
        }

        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        /* Footer Berwarna Hijau Sesuai Header */
        footer {
            background-color: var(--masjid-green);
            color: white;
            padding: 25px 0;
            margin-top: auto;
            width: 100%;
        }

        .table thead {
            background-color: #f8f9fa;
        }
        
        .btn-group-sm .btn {
            font-weight: 600;
        }
    </style>
    <style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;

        /* BACKGROUND MASJID */
        background-image: url('https://risjamalmakmurtenabang.lovestoblog.com/assets/images/makmur1.jpeg');
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

</head>
<body>

  <nav class="navbar navbar-dark" style="background-color: #006650; padding: 5px 20px;">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <span class="text-white fw-bold small">APLIKASI ABSENSI RAPAT</span>
        
        <div class="d-flex gap-2">
            <a href="tambah_rapat.php" class="btn btn-warning btn-sm fw-bold shadow-sm px-3">
                + Tambah Rapat
            </a>
            <a href="logout.php" class="btn btn-danger btn-sm fw-bold shadow-sm px-3" 
               onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                Keluar
            </a>
        </div>
    </div>
</nav>

<div class="container-fluid px-4">
    </div>

    <header class="main-header">
        <div class="d-flex align-items-center">
            <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" alt="Logo" class="logo-img me-3">
            <div>
                <h1 class="h4 mb-0 fw-bold">Masjid Jami Al Makmur Tanah Abang</h1>
                <small class="opacity-75 text-uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">Jl. KH. Mas Mansyur No. 6, Jakarta Pusat</small>
            </div>
        </div>
    </header>

    <div class="content-section">
        <div class="card card-custom">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold text-success"><i class="bi bi-calendar-event me-2"></i>DAFTAR RAPAT</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr class="text-muted small">
                            <th class="ps-4 border-0">NAMA RAPAT</th>
                            <th class="border-0">TANGGAL</th>
                            <th class="border-0">WAKTU</th>
                            <th class="border-0 text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';
                        $sql = "SELECT id, nama_rapat, tanggal_rapat, jam_rapat FROM rapat ORDER BY tanggal_rapat DESC";
                        $result = mysqli_query($koneksi, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td class='ps-4 fw-bold text-dark'>" . htmlspecialchars($row["nama_rapat"]) . "</td>";
                                echo "<td>" . date('d/m/Y', strtotime($row["tanggal_rapat"])) . "</td>";
                                echo "<td>" . date('H:i', strtotime($row["jam_rapat"])) . " WIB</td>";
                                echo "<td class='text-center'>";
                                
                                echo "<div class='btn-group btn-group-sm shadow-sm'>";
                                echo "<a href='daftar_hadir.php?id_rapat=".$row["id"]."' class='btn btn-primary px-3'>Hadir</a>";
                                echo "<a href='index.php?id_rapat=".$row["id"]."' class='btn btn-success px-3'>Isi</a>";
                                echo "<a href='notulen.php?id_rapat=".$row["id"]."' class='btn btn-danger px-3'>Notulen</a>";
                                echo "</div>";

                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center py-5 text-muted'>Belum ada data rapat yang tersedia.</td></tr>";
                        }
                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-fluid px-4">
            <div class="row align-items-center gy-3">
                <div class="col-md-6 text-center text-md-start">
                    <h6 class="fw-bold mb-1">Masjid Jami' Al Makmur</h6>
                    <p class="small mb-0 opacity-75">Jl. K.H Mas Mansyur No 6, Tanah Abang, Jakarta Pusat</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small mb-0 opacity-75">© 2025 Aplikasi Absensi Rapat Digital</p>
                    <p class="x-small mb-0 opacity-50" style="font-size: 0.7rem;">Masjid Jami Al Makmur Tanah Abang</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>