<?php 
include 'header.php'; 
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE kendaraan_nomor='$id'");
$d = mysqli_fetch_assoc($data);
?>

<style>
    .card-custom {
        border-radius: 14px;
        transition: .3s;
        overflow: hidden;
    }
    .card-custom:hover {
        transform: scale(1.01);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    .input-group-text {
        background: #fff3cd;
        font-weight: bold;
    }
</style>

<div class="container mt-4">

    <div class="card shadow card-custom">
        <div class="card-header bg-warning text-white py-3">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Edit Kendaraan
            </h4>
        </div>

        <div class="card-body">

            <div class="alert alert-warning d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Pastikan data kendaraan yang diperbarui sudah benar.
            </div>

            <form method="post" action="kendaraan_update.php">

                <input type="hidden" name="nomor" value="<?= $d['kendaraan_nomor']; ?>">

                <!-- NOMOR KENDARAAN (disabled) -->
                <div class="mb-3">
                    <label class="form-label">Nomor Kendaraan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                        <input 
                            type="text" 
                            class="form-control bg-light" 
                            value="<?= $d['kendaraan_nomor']; ?>" 
                            disabled
                        >
                    </div>
                    <small class="text-muted">Nomor kendaraan tidak bisa diubah.</small>
                </div>

                <!-- NAMA KENDARAAN -->
                <div class="mb-3">
                    <label class="form-label">Nama Kendaraan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-car-front-fill"></i></span>
                        <input 
                            type="text" 
                            name="nama" 
                            class="form-control" 
                            value="<?= $d['kendaraan_nama']; ?>" 
                            required
                        >
                    </div>
                </div>

                <!-- TIPE -->
                <div class="mb-3">
                    <label class="form-label">Tipe Kendaraan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-list-ul"></i></span>
                        <select name="tipe" class="form-select" required>
                            <option <?= $d['kendaraan_tipe']=="Mobil" ? "selected" : ""; ?>>Mobil</option>
                            <option <?= $d['kendaraan_tipe']=="Motor" ? "selected" : ""; ?>>Motor</option>
                        </select>
                    </div>
                </div>

                <!-- HARGA -->
                <div class="mb-3">
                    <label class="form-label">Harga per Hari</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                        <input 
                            type="number" 
                            name="harga" 
                            class="form-control" 
                            value="<?= $d['kendaraan_harga_perhari']; ?>" 
                            required
                        >
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-warning text-white px-4">
                        <i class="bi bi-check-circle"></i> Update
                    </button>

                    <a href="kendaraan.php" class="btn btn-secondary px-4 ms-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

<?php include 'footer.php'; ?>
