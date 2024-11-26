<?php
session_start();
include 'assets/conn.php';

if (!isset($_SESSION['nisn'])) {
    header('Location: login.php');
}

$nisn = $_SESSION['nisn'];
$query = "SELECT * FROM voters WHERE nisn='$nisn'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<!-- Header -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 80px;
    }

    /* Navbar Styling */
    .navbar {
        background-color: #2C3E50; /* Dark Blue */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        color: #fff !important;
        font-weight: bold;
    }

    .navbar-nav .nav-link {
        color: #D9E1E8 !important;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #ffffff !important;
        background-color: #34495E;
        border-radius: 5px;
    }

    /* Content Section Styling */
    h1, h2 {
        font-family: 'Arial', sans-serif;
        font-weight: 600;
        color: #2C3E50; /* Dark Blue */
    }

    ol, ul {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    .card {
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .card img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-bottom: 2px solid #f1f1f1;
    }

    .card-body {
        padding: 20px;
    }

    .card h5 {
        font-size: 18px;
        font-weight: bold;
        color: #2C3E50;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 14px;
        color: #555;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #2980b9; /* Blue */
        border: none;
        border-radius: 5px;
        font-size: 14px;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #1D6FA5;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Footer Styling */
    .footer {
        margin-top: 50px;
        background-color: #2C3E50;
        padding: 20px;
        color: #fff;
        text-align: center;
        font-size: 14px;
    }

    .footer a {
        color: #3498db;
        text-decoration: none;
        font-weight: bold;
    }

    .footer a:hover {
        color: #fff;
        text-decoration: underline;
    }

    /* Carousel Styling */
    .carousel-inner img {
        width: 100%;
        height: 400px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
        }

        .card img {
            height: 250px;
        }
    }
</style>

<!-- Body Content -->
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">VOTIE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="kandidat.php">Kandidat</a></li>
                    <li class="nav-item"><a class="nav-link" href="infuser.php">Informasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <center>
        <h2 class="my-2">PEMILIHAN CALON KETUA OSIS 2024/2025</h2>
    </center>

    <!-- Carousel -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/C1.jpg" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="assets/C2.jpg" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="assets/C3.jpg" class="d-block w-100" alt="Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <p>Ini adalah sebuah platform atau website voting online yang dirancang khusus untuk membantu proses pemilihan ketua osis yang baru di sekolah. Platform ini dirancang untuk memberikan kemudahan, keterbukaan, dan transparansi dalam proses pemilihan, sehingga seluruh siswa dan siswi dapat terlibat secara aktif dalam proses pemilihan.</p>
        <p>VOTIE juga dirancang dengan fitur-fitur keamanan yang memadai, seperti sistem verifikasi pemilih dan perlindungan data pribadi, untuk memastikan bahwa proses pemilihan berlangsung dengan adil dan tidak terjadi kecurangan. Dengan semua fitur yang ditawarkan, VOTIE menjadi solusi yang ideal untuk organisasi siswa di sekolah yang ingin meningkatkan transparansi dan partisipasi dalam proses pemilihan mereka.</p>

        <center>
            <a href="kandidat.php" class="btn btn-outline-primary">LIHAT KANDIDAT</a>
        </center>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>© 19023_Pilketos. All Rights Reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </div>
</body>
</html>
