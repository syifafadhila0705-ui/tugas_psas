<?php 
include 'header.php';
include '../koneksi.php';

// Hitung jumlah data
$jumlah_user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user"));
$jumlah_kendaraan = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kendaraan"));
$jumlah_pinjam = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pinjam"));
?>

<style>
    /* Animasi Fade In */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Card Premium */
    .card-custom {
        border: 0;
        border-radius: 18px;
        padding: 20px;
        color: white;
        background: linear-gradient(135deg, #6366f1, #3b82f6);
        box-shadow: 0 8px 25px rgba(0,0,0,0.18);
        transition: 0.3s;
        animation: fadeIn 0.7s ease;
    }

    .card-custom:hover {
        transform: translateY(-6px);
        box-shadow: 0 14px 30px rgba(0,0,0,0.22);
    }

    .card-custom.green {
        background: linear-gradient(135deg, #22c55e, #16a34a);
    }

    .card-custom.yellow {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .card-custom .icon-box {
        font-size: 40px;
        opacity: 0.8;
    }

    /* Welcome Box */
    .welcome-box {
        border-radius: 15px;
        background: #e0f2fe;
        border-left: 6px solid #0ea5e9;
        animation: fadeIn 1s ease;
    }
</style>

<div class="page-wrapper">
<div class="container mt-4">

    <h2 class="fw-bold mb-4" style="animation: fadeIn 0.5s;">
        <i class="bi bi-speedometer2"></i> Dashboard Admin
    </h2>

    <div class="row g-4">

        <!-- Card User -->
        <div class="col-md-4">
            <div class="card-custom">
                <div class="icon-box mb-2"><i class="bi bi-people"></i></div>
                <h5 class="mb-1">Total Users</h5>
                <h1 class="fw-bold"><?= $jumlah_user ?></h1>
                <a href="user.php" class="btn btn-light btn-sm mt-2 fw-semibold">
                    Lihat Data <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <!-- Card Kendaraan -->
        <div class="col-md-4">
            <div class="card-custom green">
                <div class="icon-box mb-2"><i class="bi bi-truck"></i></div>
                <h5 class="mb-1">Total Kendaraan</h5>
                <h1 class="fw-bold"><?= $jumlah_kendaraan ?></h1>
                <a href="kendaraan.php" class="btn btn-light btn-sm mt-2 fw-semibold">
                    Lihat Data <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <!-- Card Pinjam -->
        <div class="col-md-4">
            <div class="card-custom yellow">
                <div class="icon-box mb-2"><i class="bi bi-arrow-left-right"></i></div>
                <h5 class="mb-1">Total Pinjam</h5>
                <h1 class="fw-bold"><?= $jumlah_pinjam ?></h1>
                <a href="pinjam.php" class="btn btn-light btn-sm mt-2 fw-semibold">
                    Lihat Data <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <div class="p-4 shadow welcome-box">
        <h5 class="fw-bold">
            <i class="bi bi-person-check"></i> Selamat datang, <?= $_SESSION['username']; ?>!
        </h5>
        <p class="mb-0">Anda sedang berada di Dashboard Admin Sistem Informasi Rental Kendaraan.</p>
    </div>

</div>
</div>

<?php include 'footer.php'; ?>
