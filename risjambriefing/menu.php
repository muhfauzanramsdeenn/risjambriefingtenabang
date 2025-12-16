<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rapat - Masjid Jami Al Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <style>
        /* Warna kustom agar sesuai dengan gambar */
        .color-primary { background-color: #008060; }
        .color-secondary { background-color: #006650; }
        .text-primary { color: #008060; }
        
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #e0f2e0; /* Warna latar belakang hijau muda */
        }
        .main-content {
            flex-grow: 1;
            padding: 1rem 0; /* Padding vertikal untuk mobile, 0 horizontal karena kontainer sudah ada padding */
            padding-bottom: 5rem; /* Ruang lebih besar untuk menghindari footer */
        }
        .navbar-top {
            background-color: #006650; /* Warna lebih gelap untuk top nav */
        }
        .header-branding {
            background-color: #008060; /* Warna utama untuk branding */
        }
        /* Style untuk ikon placeholder */
        .icon-social {
            border: 1px solid white;
            border-radius: 9999px; /* full rounded */
            padding: 0.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
        }
        
        /* Mengatur agar tabel dapat discroll di layar kecil */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        /* Memperbesar ukuran font pada desktop */
        @media (min-width: 768px) {
            .navbar-top a {
                font-size: 1rem; /* Ukuran font standar */
            }
            .main-content {
                padding: 2rem 0; /* Padding vertikal yang lebih besar di desktop */
            }
        }
    </style>
</head>
<body>

    <nav class="navbar-top p-2 text-xs md:text-sm shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
            <a href="daftar_rapat.php" class="text-white hover:text-green-200 font-semibold">Aplikasi Absensi Rapat</a>

            <div class="flex items-center space-x-2 md:space-x-4">
                <a href="daftar_rapat.php" class="bg-white text-secondary px-2 py-1 md:px-3 rounded shadow font-bold text-xs">Daftar Rapat</a>
            </div>
        </div>
    </nav>

    <header class="header-branding p-3 md:p-4 shadow-xl">
        <div class="container mx-auto flex items-center px-4 sm:px-6 lg:px-8">
            <div class="mr-3 md:mr-4 flex-shrink-0">
                 <img src="https://risjamalmakmurtenabang.lovestoblog.com/assets/images/logo2.png" alt="Logo Masjid" class="w-8 h-8 md:w-10 md:h-10"> 
            </div>
            
            <h1 class="text-white text-lg md:text-2xl font-semibold tracking-wide truncate">
                Masjid Jami Al Makmur Tanah Abang
            </h1>
        </div>
    </header>

    <main class="main-content container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-4 md:p-6 rounded-lg shadow-lg w-full max-w-5xl mx-auto">
            <h2 class="text-xl md:text-2xl font-semibold mb-4 text-primary">Daftar Rapat</h2>

    <script>
        console.log("Halaman Daftar Rapat responsif dimuat.");
    </script>
</body>
</html>