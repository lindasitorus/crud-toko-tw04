<?php 
include 'koneksi.php'; 

// Mengambil data dari database
$query_produk = "SELECT * FROM products";
$result_produk = mysqli_query($koneksi, $query_produk);

$query_user = "SELECT * FROM users";
$result_user = mysqli_query($koneksi, $query_user);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TW04 - CRUD Toko</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <!-- Font Awesome untuk Ikon Lembut -->
    <link href="https://cloudflare.com" rel="stylesheet">
    <!-- Google Fonts Poppins -->
    <link href="https://googleapis.com" rel="stylesheet">
    
    <!-- DESAIN PASTEL ELEGAN & ANTI BERTUMPUK -->
    <style>
        body {
            background: linear-gradient(135deg, #eef2f7 0%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #4a5568;
            padding: 50px 0;
        }
        .container {
            max-width: 900px;
        }
        .header-section {
            text-align: center;
            margin-bottom: 40px;
        }
        .main-card {
            border: none;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            padding: 30px;
            margin-bottom: 35px;
        }
        .card-title-custom {
            color: #354f77;
            font-weight: 600;
            border-bottom: 2px solid #edf2f7;
            padding-bottom: 12px;
            margin-bottom: 20px;
            text-align: left;
        }
        .table {
            text-align: center;
            vertical-align: middle;
            margin-top: 15px;
        }
        .table th {
            background-color: #f8fafc !important;
            color: #4a6fa5 !important;
            border-bottom: 2px solid #e2e8f0 !important;
            font-weight: 600;
            padding: 12px;
        }
        .btn-soft-primary {
            background: linear-gradient(135deg, #4a6fa5 0%, #354f77 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-soft-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 111, 165, 0.3);
            color: white;
        }
        .btn-soft-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-soft-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(56, 161, 105, 0.3);
            color: white;
        }
        .text-empty {
            color: #a0aec0;
            font-style: italic;
            padding: 20px 0;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Bagian Judul Utama Tugas -->
        <div class="header-section">
            <h2 class="fw-bold mb-1" style="color: #354f77;">Tugas TW04 - Sistem CRUD Toko</h2>
            <p class="text-muted">Integrasi Antarmuka Database User & Penambahan Produk</p>
        </div>
        
        <!-- KARTU 1: MANAJEMEN PRODUK -->
        <div class="card main-card">
            <div class="d-flex justify-content-between align-items-center card-title-custom">
                <h4 class="mb-0"><i class="fa-solid fa-box open me-2"></i>Manajemen Produk</h4>
                <a href="tambah_produk.php" class="btn btn-soft-primary shadow-sm"><i class="fa-solid fa-plus me-2"></i>Tambah Produk</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="35%">Nama Produk</th>
                            <th width="20%">Harga</th>
                            <th width="15%">Stok</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($result_produk) > 0) {
                            $no = 1;
                            while($row = mysqli_fetch_assoc($result_produk)) { 
                        ?>
                            <tr>
                                <td><strong><?= $no++; ?></strong></td>
                                <td class="fw-semibold text-dark text-start ps-3"><?= htmlspecialchars($row['nama_produk']); ?></td>
                                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                <td><span class="badge bg-light text-dark border px-3 py-2"><?= $row['stok']; ?> unit</span></td>
                                <td>
                                    <a href="edit_produk.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                    <a href="hapus_produk.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php 
                            } 
                        } else { 
                        ?>
                            <tr>
                                <td colspan="5" class="text-empty"><i class="fa-solid fa-inbox me-2"></i>Belum ada data produk. Silakan klik tombol tambah produk di atas.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- KARTU 2: MANAJEMEN USER -->
        <div class="card main-card">
            <div class="d-flex justify-content-between align-items-center card-title-custom">
                <h4 class="mb-0"><i class="fa-solid fa-circle-user me-2"></i>Manajemen User</h4>
                <a href="tambah_user.php" class="btn btn-soft-success shadow-sm"><i class="fa-solid fa-user-plus me-2"></i>Tambah User</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="35%">Username</th>
                            <th width="35%">Email</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($result_user) > 0) {
                            $no_user = 1;
                            while($row_user = mysqli_fetch_assoc($result_user)) { 
                        ?>
                            <tr>
                                <td><strong><?= $no_user++; ?></strong></td>
                                <td class="fw-semibold text-dark text-start ps-3"><?= htmlspecialchars($row_user['username']); ?></td>
                                <td class="text-muted text-start ps-3"><?= htmlspecialchars($row_user['email']); ?></td>
                                <td>
                                    <a href="edit_user.php?id=<?= $row_user['id']; ?>" class="btn btn-sm btn-outline-warning me-1">Edit</a>
                                    <a href="hapus_user.php?id=<?= $row_user['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus user ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php 
                            } 
                        } else { 
                        ?>
                            <tr>
                                <td colspan="4" class="text-empty"><i class="fa-solid fa-user-slash me-2"></i>Belum ada data user. Silakan klik tombol tambah user di atas.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://jsdelivr.net"></script>
</body>
</html>