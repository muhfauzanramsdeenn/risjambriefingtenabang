<?php
include 'koneksi.php';
$id_rapat = isset($_GET['id_rapat']) ? $_GET['id_rapat'] : null;

if (!$id_rapat) {
    header("Location: daftar_rapat.php");
    exit();
}

// Ambil info rapat untuk judul
$sql_info = "SELECT nama_rapat FROM rapat WHERE id = '$id_rapat'";
$res_info = mysqli_query($koneksi, $sql_info);
$data_rapat = mysqli_fetch_assoc($res_info);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notulen Rapat - Masjid Jami Al Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        .bg-custom-primary { background-color: #008060 !important; }
        .bg-custom-secondary { background-color: #006650 !important; }
        .text-custom-green { color: #008060; }
        
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8faf9;
        }

        .full-width-section { width: 100%; }

        .main-content {
            flex: 1;
            padding: 2rem 0;
        }

        .card-notulen {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            background: white;
            margin-bottom: 2rem;
        }

        .table thead {
            background-color: #f1f8f6;
            color: #006650;
        }

        textarea.form-control {
            background-color: #fdfdfd;
            border: 1px solid #e0e0e0;
        }

        textarea.form-control:focus {
            border-color: #008060;
            box-shadow: 0 0 0 0.25rem rgba(0, 128, 96, 0.1);
        }

        footer {
            background-color: #008060;
            color: white;
            padding: 40px 0 20px 0;
            margin-top: auto;
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

    <nav class="navbar navbar-dark bg-custom-secondary full-width-section py-2 shadow-sm">
        <div class="container-fluid px-4">
            <span class="navbar-brand mb-0 h6 small fw-bold">APLIKASI ABSENSI RAPAT</span>
            <a href="daftar_rapat.php" class="btn btn-light btn-sm fw-bold px-3">Kembali ke Daftar</a>
        </div>
    </nav>

    <header class="bg-custom-primary text-white full-width-section py-3 shadow">
        <div class="container-fluid px-4 d-flex align-items-center">
            <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" alt="Logo" width="45" height="45" class="me-3 bg-white p-1 rounded-circle">
            <div>
                <h1 class="h4 mb-0 fw-bold">Masjid Jami Al Makmur Tanah Abang</h1>
                <small class="opacity-75">Notulen Rapat: <?php echo htmlspecialchars($data_rapat['nama_rapat']); ?></small>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="container-fluid px-4">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    
                    <div class="card card-notulen p-4">
                        <h2 class="h4 fw-bold text-custom-green mb-4"><i class="bi bi-pencil-square"></i> Catat Notulen Baru</h2>
                        <form method="POST" action="simpan_notulen.php">
                            <input type="hidden" name="id_rapat" value="<?php echo $id_rapat; ?>">
                            
                            <div class="mb-3">
                                <label for="poin_penting" class="form-label fw-bold small text-muted">POIN PENTING</label>
                                <textarea name="poin_penting" id="poin_penting" rows="3" required class="form-control" placeholder="Tuliskan poin-poin diskusi..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="keputusan" class="form-label fw-bold small text-muted">KEPUTUSAN</label>
                                <textarea name="keputusan" id="keputusan" rows="3" required class="form-control" placeholder="Tuliskan hasil keputusan rapat..."></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="tindakan" class="form-label fw-bold small text-muted">TINDAKAN (ACTION PLAN)</label>
                                <textarea name="tindakan" id="tindakan" rows="3" required class="form-control" placeholder="Tuliskan langkah selanjutnya..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 fw-bold shadow-sm py-3">
                                <i class="bi bi-check-circle"></i> Simpan Notulen
                            </button>
                        </form>
                    </div>

                    <div class="card card-notulen overflow-hidden">
                        <div class="card-header bg-light py-3 px-4 border-0">
                            <h2 class="h5 fw-bold text-dark mb-0"><i class="bi bi-journal-text"></i> Riwayat Notulen</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-3" style="width: 33%;">Poin Penting</th>
                                        <th class="px-4 py-3" style="width: 33%;">Keputusan</th>
                                        <th class="px-4 py-3" style="width: 33%;">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT poin_penting, keputusan, tindakan FROM notulen WHERE id_rapat = '$id_rapat'";
                                    $result = mysqli_query($koneksi, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td class='px-4 py-3 small' style='white-space: pre-line;'>" . htmlspecialchars($row["poin_penting"]). "</td>";
                                            echo "<td class='px-4 py-3 small fw-semibold' style='white-space: pre-line;'>" . htmlspecialchars($row["keputusan"]). "</td>";
                                            echo "<td class='px-4 py-3 small text-muted' style='white-space: pre-line;'>" . htmlspecialchars($row["tindakan"]). "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3' class='text-center py-5 text-muted'>Belum ada notulen yang dicatat untuk rapat ini.</td></tr>";
                                    }
                                    mysqli_close($koneksi);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container-fluid px-5 text-center text-md-start">
            <div class="row gy-3">
                <div class="col-md-6">
                    <h5 class="fw-bold">Masjid Jami' Al Makmur</h5>
                    <p class="small opacity-75 mb-0">Jl. K.H Mas Mansyur No 6, Tanah Abang, Jakarta Pusat</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small mb-0 opacity-50">© 2025 Aplikasi Absensi Rapat Digital</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>