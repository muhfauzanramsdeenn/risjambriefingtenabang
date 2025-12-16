<?php
include 'koneksi.php';

$id_rapat = isset($_GET['id_rapat']) ? $_GET['id_rapat'] : null;

if (!$id_rapat) {
    header("Location: daftar_rapat.php");
    exit();
}

$sql_rapat = "SELECT nama_rapat, tanggal_rapat, jam_rapat FROM rapat WHERE id = '$id_rapat'";
$result_rapat = mysqli_query($koneksi, $sql_rapat);

if (mysqli_num_rows($result_rapat) > 0) {
    $row_rapat = mysqli_fetch_assoc($result_rapat);
    $nama_rapat = $row_rapat['nama_rapat'];
    $tanggal_rapat = $row_rapat['tanggal_rapat'];
    $jam_rapat = date('h:i A', strtotime($row_rapat['jam_rapat']));
} else {
    header("Location: daftar_rapat.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Rapat - Masjid Jami Al Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png">
    <style>
        .bg-custom-primary { background-color: #008060 !important; }
        .bg-custom-secondary { background-color: #006650 !important; }
        .text-custom-green { color: #008060; }
        
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100%;
            height: 100%;
            background-color: #e0f2e0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .full-width-section {
            width: 100% !important;
            margin: 0 !important;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .card-absensi {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            background-color: white;
        }

        /* Pembungkus Canvas agar responsif di HP */
        .signature-wrapper {
            position: relative;
            width: 100%;
            height: 200px;
            border: 2px solid #dee2e6;
            background-color: #f8f9fa;
            border-radius: 8px;
            touch-action: none; /* Penting: Mencegah scroll saat tanda tangan */
        }

        #signatureCanvas {
            width: 100%;
            height: 100%;
            cursor: crosshair;
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
        <div class="container-fluid px-3">
            <span class="navbar-brand mb-0 h6 small fw-bold">Aplikasi Absensi Rapat</span>
            <a href="daftar_rapat.php" class="btn btn-light btn-sm fw-bold">Daftar Rapat</a>
        </div>
    </nav>

    <header class="bg-custom-primary text-white full-width-section py-3 shadow">
        <div class="container-fluid px-3 d-flex align-items-center">
            <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" alt="Logo" width="40" height="40" class="me-3 bg-white p-1 rounded-circle">
            <h1 class="h5 mb-0 fw-bold">Masjid Jami Al Makmur Tanah Abang</h1>
        </div>
    </header>

    <main class="main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-absensi p-4">
                        <div class="text-center mb-4">
                            <h2 class="h4 fw-bold text-custom-green mb-1"><?php echo $nama_rapat; ?></h2>
                            <p class="text-muted small">
                                <?php echo date('d F Y', strtotime($tanggal_rapat)); ?> | <?php echo $jam_rapat; ?>
                            </p>
                            <hr>
                        </div>

                        <form id="formAbsensi" method="POST" action="simpan_kehadiran.php">
                            <input type="hidden" name="id_rapat" value="<?php echo $id_rapat; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama..." required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Divisi</label>
                                <input type="text" name="divisi" class="form-control" placeholder="Divisi..." required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="" selected disabled>Pilih...</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                          
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Tanda Tangan:</label>
                                <div class="signature-wrapper">
                                    <canvas id="signatureCanvas"></canvas>
                                </div>
                                <button type="button" id="clearSignature" class="btn btn-sm btn-link text-danger p-0 mt-1">Bersihkan</button>
                                <input type="hidden" name="signatureData" id="signatureData">
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100 fw-bold py-2 shadow-sm">
                                Konfirmasi Kehadiran
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const canvas = document.getElementById('signatureCanvas');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });

        // Fungsi untuk mengatur resolusi canvas agar tidak buram di HP
        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
            signaturePad.clear(); // Bersihkan saat orientasi layar berubah
        }

        window.onresize = resizeCanvas;
        resizeCanvas();

        // Tombol Bersihkan
        document.getElementById('clearSignature').addEventListener('click', () => {
            signaturePad.clear();
        });

        // Validasi dan pengiriman data
        document.getElementById('formAbsensi').addEventListener('submit', function(e) {
            if (signaturePad.isEmpty()) {
                alert("Silakan isi tanda tangan terlebih dahulu.");
                e.preventDefault();
            } else {
                // Konversi gambar ke format Base64 dan simpan ke input hidden
                const dataURL = signaturePad.toDataURL();
                document.getElementById('signatureData').value = dataURL;
            }
        });
    </script>
</body>
</html>