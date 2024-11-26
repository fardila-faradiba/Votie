<?php
session_start();
include '../assets/conn.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
  header('Location: logad.php');
  exit();
}

// Ambil data kandidat beserta jumlah vote-nya
$result = mysqli_query($conn, "SELECT * FROM candidates ORDER BY vote_count DESC");
$candidates = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <?php include '../assets/header.php'; ?>
    <style>
        /* Custom navbar color */
        .navbar-custom {
            background-color: green;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">VOTIE Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kandidat.html">Hasil Vote</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <center><h1>Hasil Vote</h1>
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama Kandidat</th>
                        <th>Jumlah Suara</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($candidates as $candidate): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $candidate["name"]; ?></td>
                        <td><?= $candidate["vote_count"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
                </center>

                <div class="col-md-6">
                    <!-- Card for Voting Results Chart -->
                    <div class="card">
                        <div class="card-header">
                            HASIL VOTE
                        </div>
                        <div class="card-body">
                            <canvas id="voteChart"></canvas>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <script>
                                var ctx = document.getElementById('voteChart').getContext('2d');
                                var voteChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: <?php echo json_encode(array_column($candidates, 'name')); ?>,
                                        datasets: [{
                                            label: 'Vote Count',
                                            data: <?php echo json_encode(array_column($candidates, 'vote_count')); ?>,
                                            backgroundColor: [
                                                '#FF6384',
                                                '#36A2EB',
                                                '#FFCE56',
                                                '#8c564b',
                                                '#e377c2',
                                                '#7f7f7f',
                                                '#bcbd22',
                                                '#17becf',
                                                '#9467bd',
                                                '#d62728',
                                                '#2ca02c'
                                            ]
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
