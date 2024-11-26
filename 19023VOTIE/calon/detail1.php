<?php
session_start();
include '../assets/conn.php';

if (!isset($_SESSION['nisn'])) {
    header('Location: login.php');
}

// Ambil ID kandidat atau data terkait yang dibutuhkan
// Misalnya ID kandidat 1 untuk tujuan ini
$candidate_id = 1; // Bisa disesuaikan berdasarkan parameter atau pilihan kandidat

$query = "SELECT * FROM candidates WHERE id = '$candidate_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error: ' . mysqli_error($conn)); // Handle error jika query gagal
}

$row = mysqli_fetch_assoc($result);

// Pastikan ada data kandidat yang ditemukan
if (!$row) {
    echo "Kandidat tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kandidat - VOTIE</title>
    <?php include '../assets/header.php'; ?>
    <style>
        /* Navbar Biru Tua */
        .navbar {
            background-color: #003366; /* Warna Biru Tua */
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: #ffffff !important; /* Teks putih pada navbar */
        }

        .navbar .nav-link {
            position: relative;
            padding: 10px 15px;
        }

        /* Hover effect untuk navbar links */
        .navbar .nav-link:hover {
            color: #ffffff !important; /* Tetap putih saat hover */
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.6), 0 0 10px rgba(255, 255, 255, 0.4);
        }

        .navbar-nav {
            margin-left: auto; /* Menjaga navbar items di sebelah kanan */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">VOTIE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="../kandidat.php">Kandidat</a></li>
                    <li class="nav-item"><a class="nav-link" href="../infuser.php">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <br><br>
        <h1 class="my-3">Detail Kandidat: <?php echo $row['name']; ?></h1>
        
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo $row['pict']; ?>" class="img-fluid" alt="Photo of <?php echo $row['pict']; ?>">
            </div>
            <div class="col-md-8">
                <h3>Visi</h3>
                <p><?php echo $row['visi']; ?></p>

                <h3>Misi</h3>
                <p><?php echo $row['misi']; ?></p>

                <a href="../kandidat.php" class="btn btn-secondary">Kembali</a>
                <a href="../voting.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Vote</a>
            </div>
        </div>
    </div>

    <br><br><br>
    <?php include '../assets/footer.php'; ?>
 <!-- Footer -->
 <div class="footer">
        <p>© 19023_Pilketos. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </div>
</body>
</html>
