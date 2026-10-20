<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);

    $query = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>alert('User berhasil ditambahkan!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan user');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User Baru</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link href="https://cloudflare.com" rel="stylesheet">
    <!-- Google Fonts Poppins -->
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #eef2f7 0%, #e2e8f0 100%); 
            min-height: 100vh; 
            font-family: 'Poppins', sans-serif; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            padding: 20px;
        }
        .form-card { 
            border: none; 
            border-radius: 24px; 
            background: #ffffff; 
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05); 
            padding: 40px; 
            max-width: 480px; 
            width: 100%; 
        }
        .btn-soft-success { 
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%); 
            color: white; 
            border: none; 
            border-radius: 12px; 
            transition: all 0.3s; 
            font-weight: 500;
        }
        .btn-soft-success:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 5px 15px rgba(56, 161, 105, 0.3);
            color: white; 
        }
        .form-control {
            border-radius: 10px;
            padding: 10px 15px;
            border: 1px solid #e2e8f0;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(72, 187, 120, 0.2);
            border-color: #48bb78;
        }
    </style>
</head>
<body>
    <div class="form-card">
        <div class="text-center mb-4">
            <h4 class="fw-bold mb-1" style="color: #2f855a;"><i class="fa-solid fa-user-plus me-2"></i>Tambah User Baru</h4>
            <p class="text-muted small">Silakan lengkapi data pengguna di bawah ini</p>
        </div>
        
        <form action="" method="POST">
            <div class="mb-3 text-start">
                <label class="form-label fw-medium text-secondary">Nama Pengguna (Username)</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan nama username" required>
            </div>
            
            <div class="mb-4 text-start">
                <label class="form-label fw-medium text-secondary">Alamat Email</label>
                <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" name="simpan" class="btn btn-soft-success py-2-5">Simpan Data User</button>
                <a href="index.php" class="btn btn-light py-2 text-muted border-0" style="border-radius: 12px;">Batal & Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>