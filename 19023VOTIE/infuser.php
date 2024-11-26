Log in

Sign up
You said:
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
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Informasi</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <style>
    /* Navbar biru tua */
    .navbar {
        background-color: #003366; /* Biru Tua */
    }

    .navbar .navbar-brand,
    .navbar .nav-link {
        color: #ffffff !important; /* Teks putih pada navbar */
    }

    .navbar .nav-link {
        position: relative;
        padding: 10px 15px;
    }

    /* Efek bubble */
    .navbar .nav-link:hover {
        color: #ffffff !important; /* Tetap putih saat hover */
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.6), 0 0 10px rgba(255, 255, 255, 0.4);
    }

    .navbar-nav {
        margin-left: auto; /* Memastikan menu navbar berada di sebelah kanan */
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
        <li class="nav-item">
            <a class="nav-link" href="index.php">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="kandidat.php">Kandidat</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="infuser.php">Informasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
   </div>
  </div>
 </nav>

 <div class="container">
 <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <center><br><br>
        <h3 style="color: black;">Informasi</h3>
        <table class="table table-striped">
          <thead>
          </thead>
          <tbody>
          <tr>
              <th scope="row">Nama:</th>
              <td><?= $row["name"]; ?></td>
            </tr>
            <tr>
              <th scope="row">Kelas:</th>
              <td><?= $row["class"]; ?></td>
            </tr>
            <tr>
              <th scope="row">Nisn:</th>
              <td><?= $row["nisn"]; ?></td>
            </tr>
            <tr>
              <th scope="row">Status Vote:</th>
                <td><?= $row["ready"] ? '<font color="green">Sudah Vote!!</font>' : '<font color="red">Belum Vote!!</font>'; ?></td>
             </tr>
             <tr>
               <th scope="row">RealTime</th>
                 <td id="jam"></td>
                   </tr>
                  </tbody>
                 </table>
                </center>
               </div>
              </div>
             </div>
            </div>
          </div>

        <script>
          setInterval(function() {
            var now = new Date();
            var jam = now.getHours();
            var menit = now.getMinutes();
            var detik = now.getSeconds();
            jam = jam < 10 ? "0" + jam : jam;
            menit = menit < 10 ? "0" + menit : menit;
            detik = detik < 10 ? "0" + detik : detik;
            var waktu = jam + ":" + menit + ":" + detik;
            var selamat = "";

            if (jam >= 0 && jam < 12) {
                selamat = "Selamat pagi!";
            } else if (jam >= 12 && jam < 18) {
                selamat = "Selamat siang!";
            } else {
                selamat = "Selamat malam!";
            }

            document.getElementById("jam").innerHTML = selamat + " " + waktu;
          }, 1000);
        </script>


</body>
</html>