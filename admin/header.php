<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Rental Kendaraan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Background Gradient */
        body {
            background: linear-gradient(135deg, #eef2ff, #e0f2fe, #fef9c3);
            background-size: 300% 300%;
            animation: gradientMove 12s ease infinite;
            margin: 0;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Float Glass Navbar */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.2) !important;
            backdrop-filter: blur(15px);
            border-radius: 14px;
            margin: 12px auto;
            width: 95%;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .navbar-glass .nav-link {
            color: #000;
            font-weight: 600;
            transition: 0.25s ease;
            border-radius: 8px;
            padding: 8px 12px;
        }

        .navbar-glass .nav-link:hover {
            background: rgba(0,0,0,0.08);
            transform: translateY(-3px);
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        /* Username */
        .user-box {
            background: rgba(0,0,0,0.07);
            padding: 4px 10px;
            border-radius: 8px;
            font-weight: 600;
        }

        /* Page Wrapper */
        .page-wrapper {
            min-height: calc(100vh - 80px);
            padding: 20px;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {opacity:0; transform:translateY(10px);}
            to {opacity:1; transform:translateY(0);}
        }
    </style>
</head>

<body>

<!-- NAVBAR BARU -->
<nav class="navbar navbar-expand-lg navbar-glass shadow-sm">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <i class="bi bi-lightning-charge-fill me-2 text-warning"></i>
            <span>Rental Kendaraan</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarAdmin">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="user.php">
                        <i class="bi bi-people"></i> Users
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="kendaraan.php">
                        <i class="bi bi-truck"></i> Kendaraan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="pinjam.php">
                        <i class="bi bi-arrow-left-right"></i> Pinjam
                    </a>
                </li>

            </ul>

            <ul class="navbar-nav ms-auto d-flex align-items-center">

                <li class="nav-item me-3">
                    <div class="user-box">
                        <i class="bi bi-person-circle"></i>
                        Halo, <b><?= $_SESSION['username']; ?></b>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="logout.php" class="btn btn-danger btn-sm shadow-sm">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<br>
