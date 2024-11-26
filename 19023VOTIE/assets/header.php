<!-- Header -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
    /* Global Styles */
    body {
        font-family: 'Helvetica', sans-serif;
        background-color: #f4f6f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        margin-top: 80px;
    }

    .navbar {
        background-color: #2d3e50;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        color: #fff !important;
        font-weight: bold;
    }

    .navbar-nav .nav-link {
        color: #dfe6e9 !important;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #ffffff !important;
        background-color: #1f2a36;
        border-radius: 5px;
    }

    /* Candidate Card Styles */
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-bottom: 2px solid #f1f1f1;
    }

    .card-body {
        padding: 20px;
    }

    .card h5 {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 14px;
        color: #555;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #3498db;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        padding: 10px 15px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .footer {
        margin-top: 50px;
        background-color: #2d3e50;
        padding: 20px;
        color: #fff;
        text-align: center;
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

    /* Responsive Styling */
    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
        }

        .card img {
            height: 200px;
        }
    }

</style>

