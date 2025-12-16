<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rapat - Masjid Jami Al Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        /* Warna Branding Masjid */
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
            padding: 3rem 0;
            display: flex;
            align-items: center;
        }

        .card-form {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background: white;
        }

        footer {
            background-color: #008060;
            color: white;
            padding: 30px 0 20px 0;
            margin-top: auto;
        }

        .form-control:focus {
            border-color: #008060;
            box-shadow: 0 0 0 0.25rem rgba(0, 128, 96, 0.25);
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
            <div class="ms-auto">
                <a href="daftar_rapat.php" class="btn btn-light btn-sm fw-bold px-3">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </nav>

    <header class="bg-custom-primary text-white full-width-section py-3 shadow">
        <div class="container-fluid px-4 d-flex align-items-center">
            <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" alt="Logo" width="45" height="45" class="me-3 bg-white p-1 rounded-circle">
            <h1 class="h4 mb-0 fw-bold">Masjid Jami Al Makmur Tanah Abang</h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-5">
                    
                    <div class="text-center mb-4">
                        <h2 class="h3 fw-bold text-custom-green mb-1 text-uppercase">Tambah Rapat Baru</h2>
                        <p class="text-muted">Masukkan rincian agenda rapat pengurus</p>
                    </div>

                    <div class="card card-form p-4 p-md-5">
                        <form method="POST" action="simpan_rapat.php">
                            <div class="mb-3">
                                <label for="nama_rapat" class="form-label small fw-bold text-uppercase text-muted">Nama Rapat</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi- megaphone text-custom-green"></i></span>
                                    <input type="text" name="nama_rapat" id="nama_rapat" class="form-control bg-light border-start-0" placeholder="Contoh: Rapat Pleno Ramadhan" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_rapat" class="form-label small fw-bold text-uppercase text-muted">Tanggal</label>
                                    <input type="date" name="tanggal_rapat" id="tanggal_rapat" class="form-control bg-light" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="jam_rapat" class="form-label small fw-bold text-uppercase text-muted">Waktu/Jam</label>
                                    <input type="time" name="jam_rapat" id="jam_rapat" class="form-control bg-light" required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success btn-lg w-100 fw-bold py-3 shadow-sm text-uppercase">
                                    <i class="bi bi-check-circle-fill me-2"></i> Simpan Agenda Rapat
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container-fluid px-5 text-center text-md-start">
            <div class="row gy-3">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-1">Masjid Jami' Al Makmur</h5>
                    <p class="small opacity-75 mb-0">Jl. K.H Mas Mansyur No 6, Tanah Abang, Jakarta Pusat</p>
                </div>
                <div class="col-md-6 text-md-end d-flex flex-column justify-content-center">
                    <p class="small mb-0 opacity-75">© 2025 All Rights Reserved</p>
                    <p class="x-small opacity-50 text-uppercase tracking-wider">Sistem Absensi Digital Masjid</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>