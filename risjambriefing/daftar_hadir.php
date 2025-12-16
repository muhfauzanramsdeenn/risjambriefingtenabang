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
    <title>Daftar Hadir - <?php echo htmlspecialchars($data_rapat['nama_rapat']); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    
    <style>
        :root {
            --primary-green: #008060;
            --secondary-green: #006650;
        }

        body {
            background-color: #f8faf9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .bg-custom-primary { background-color: var(--primary-green) !important; }
        .bg-custom-secondary { background-color: var(--secondary-green) !important; }
        .text-custom-green { color: var(--primary-green); }
        
        .main-content { flex: 1; padding: 2rem 0; }

        .table-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            background: white;
        }

        /* Mengatur agar gambar tanda tangan pas di HP */
        .signature-img {
            max-height: 50px;
            width: auto;
            filter: contrast(1.2) brightness(0.9);
            /* Menghilangkan background abu-abu jika ada */
            mix-blend-mode: multiply; 
        }

        @media (max-width: 768px) {
            .h4 { font-size: 1.1rem; }
            .btn-action-text { display: none; } /* Sembunyikan teks tombol di HP agar muat */
        }

        footer {
            background-color: var(--primary-green);
            color: white;
            padding: 30px 0;
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

    <nav class="navbar navbar-dark bg-custom-secondary py-2 shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h6 small fw-bold">ABSENSI DIGITAL</span>
            <a href="daftar_rapat.php" class="btn btn-light btn-sm fw-bold px-3 rounded-pill shadow-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </nav>

    <header class="bg-custom-primary text-white py-4 shadow">
        <div class="container-fluid d-flex align-items-center">
            <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" 
                 alt="Logo" width="50" height="50" class="me-3 bg-white p-1 rounded-circle">
            <div>
                <h1 class="h4 mb-0 fw-bold">Masjid Jami Al Makmur</h1>
                <p class="small mb-0 opacity-75">Daftar Kehadiran Peserta Rapat</p>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="container-fluid">
            <div class="row align-items-center mb-4">
                <div class="col-7">
                    <h2 class="h5 fw-bold text-custom-green mb-0 text-uppercase">Daftar Hadir</h2>
                    <p class="text-muted small mb-0 fw-bold"><?php echo htmlspecialchars($data_rapat['nama_rapat']); ?></p>
                </div>
                <div class="col-5 text-end">
                    <a href="index.php?id_rapat=<?php echo $id_rapat; ?>" class="btn btn-primary btn-sm shadow-sm fw-bold">
                        <i class="bi bi-person-plus"></i> <span class="btn-action-text">Tambah</span>
                    </a>
                    <button onclick="exportToExcel()" class="btn btn-success btn-sm shadow-sm fw-bold">
                        <i class="bi bi-file-excel"></i> <span class="btn-action-text">Excel</span>
                    </button>
                </div>
            </div>

            <div class="table-card">
                <div class="table-responsive">
                    <table id="daftarHadirTable" class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3 py-3">Nama</th>
                                <th class="py-3">Jabatan</th>
                                <th class="py-3 text-center">L/P</th>
                                <th class="py-3 text-center">Tanda Tangan</th>
                                <th class="pe-3 py-3 text-end">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT nama, divisi, jenis_kelamin, tanda_tangan, waktu_hadir FROM peserta WHERE id_rapat = '$id_rapat' ORDER BY waktu_hadir DESC";
                            $result = mysqli_query($koneksi, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $lp = ($row['jenis_kelamin'] == 'Laki-laki') ? 'L' : 'P';
                                    echo "<tr>";
                                    echo "<td class='ps-3 fw-bold small'>" . htmlspecialchars($row["nama"]) . "</td>";
                                    echo "<td><span class='text-muted' style='font-size: 0.75rem;'>" . htmlspecialchars($row["divisi"]) . "</span></td>";
                                    echo "<td class='text-center'><small class='badge border text-dark'>" . $lp . "</small></td>";
                                    
                                    // Kolom Tanda Tangan
                                    echo "<td class='text-center'>";
                                    if(!empty($row["tanda_tangan"])) {
                                        echo "<img src='" . $row["tanda_tangan"] . "' class='signature-img' alt='ttd'>";
                                    } else {
                                        echo "<span class='text-muted small'>-</span>";
                                    }
                                    echo "</td>";
                                    
                                    echo "<td class='pe-3 text-end small text-muted'>" . date('H:i', strtotime($row["waktu_hadir"])) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center py-5 text-muted small'>Belum ada data hadir.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container-fluid text-center">
            <p class="small mb-0">© 2025 Masjid Jami' Al Makmur Tanah Abang</p>
        </div>
    </footer>

    <script>
        function exportToExcel() {
            const table = document.getElementById('daftarHadirTable');
            // Menghapus kolom gambar untuk excel karena Excel tidak mendukung gambar base64 secara langsung via library ini
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Daftar Hadir');
            XLSX.writeFile(wb, 'Absensi_<?php echo $id_rapat; ?>.xlsx');
        }
    </script>
</body>
</html>