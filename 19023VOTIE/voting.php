<?php
session_start();
include 'assets/conn.php';

// Cek jika pengguna belum login
if (!isset($_SESSION['nisn'])) {
    header('Location: login.php');
    exit();
}

// Ambil ID kandidat dari parameter GET
if (isset($_GET['id'])) {
    $candidate_id = $_GET['id'];
} else {
    echo "ID kandidat tidak ditemukan.";
    exit();
}

// Cek apakah pemilih sudah memberikan suara
$nisn = $_SESSION['nisn'];
$query_check_vote = "SELECT * FROM votes WHERE nisn = '$nisn' AND candidate_id = '$candidate_id'";
$vote_result = mysqli_query($conn, $query_check_vote);

// Jika sudah memilih, tampilkan pesan
if (mysqli_num_rows($vote_result) > 0) {
    echo "<script>alert('Anda sudah memberikan suara untuk kandidat ini.'); window.location.href = 'kandidat.php';</script>";
    exit();
}

/// Setelah proses voting
if (isset($_POST['vote'])) {
    // Update jumlah suara kandidat
    $query_update_vote = "UPDATE candidates SET vote_count = vote_count + 1 WHERE id = '$candidate_id'";

    // Simpan data vote pemilih ke tabel votes
    $query_insert_vote = "INSERT INTO votes (nisn, candidate_id) VALUES ('$nisn', '$candidate_id')";

    // Update status ready pemilih ke 1 (sudah vote)
    $query_update_ready = "UPDATE voters SET ready = 1 WHERE nisn = '$nisn'"; // Update status ready menjadi 1

    if (mysqli_query($conn, $query_update_vote) && mysqli_query($conn, $query_insert_vote) && mysqli_query($conn, $query_update_ready)) {
        echo "<script>alert('Terima kasih telah memberikan suara!'); window.location.href = 'kandidat.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting - VOTIE</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk navbar biru */
        .navbar {
            background-color: #003366; /* Biru Tua */
        }

        .navbar .navbar-brand,
        .navbar .nav-link {
            color: white !important; /* Teks putih pada navbar */
        }

        .navbar .nav-link:hover {
            color: #ffcc00 !important; /* Warna teks kuning saat hover */
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.6), 0 0 10px rgba(255, 255, 255, 0.4);
        }

        .navbar-nav {
            margin-left: auto; /* Memastikan menu navbar berada di sebelah kanan */
        }

        /* Padding untuk konten agar tidak tertutup navbar */
        .container {
            margin-top: 80px; /* Menambahkan jarak untuk menghindari navbar yang fixed */
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

    <<div class="container">
    <br><br>
    <!-- Judul dan deskripsi yang diratakan ke tengah -->
    <h1 class="my-3 text-center">Anda memilih kandidat: <?php echo $candidate_id; ?></h1>
    <p class="text-center">Silakan tekan tombol di bawah ini untuk memberikan suara Anda.</p>
    
    <!-- Form vote yang diratakan ke tengah -->
    <form method="POST" class="text-center mt-4">
        <button type="submit" name="vote" class="btn btn-danger btn-lg px-4 py-2">Vote Sekarang</button>
    </form>

    <!-- Tombol Kembali yang juga diratakan ke tengah -->
    <div class="text-center mt-3">
        <a href="kandidat.php" class="btn btn-secondary btn-lg px-4 py-2">Kembali</a>
    </div>
</div>

<br><br><br>


</body>
</html>

