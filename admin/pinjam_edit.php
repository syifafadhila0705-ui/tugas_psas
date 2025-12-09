<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<?php
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM pinjam WHERE pinjam_id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    body {
        background: #f5f7fb;
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    .card-super {
        width: 550px;
        margin: 40px auto;
        border-radius: 18px;
        overflow: hidden;
        animation: fadeIn .7s ease;
        border: 1px solid #dce3f0;
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
        background: white;
    }

    .header-gradient {
        background: linear-gradient(135deg, #0d6efd, #003b95);
        padding: 28px;
        color: white;
        text-align: center;
        text-shadow: 0 2px 4px rgba(0,0,0,0.25);
    }

    .header-gradient h4 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        font-size: 15px;
    }

    .input-group-text {
        background: #eef2f7;
        font-size: 18px;
        border-radius: 10px 0 0 10px;
    }

    .form-select, .form-control {
        padding: 11px;
        border-radius: 10px;
        border: 1px solid #cfd7e4;
        font-size: 15px;
        transition: .3s;
    }

    .form-select:focus, .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13,110,253,0.15);
    }

    .btn-modern {
        width: 100%;
        padding: 12px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        transition: .25s;
    }

    .btn-modern:hover {
        transform: scale(1.05);
    }

    .info-box {
        background: #eaf2ff;
        border-left: 4px solid #0d6efd;
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
    }
</style>

<div class="card-super">

    <!-- HEADER -->
    <div class="header-gradient">
        <h4><i class="bi bi-pencil-square me-2"></i> Edit Peminjaman Kendaraan</h4>
    </div>

    <!-- BODY -->
    <div class="p-4">

        <div class="info-box d-flex">
            <i class="bi bi-info-circle-fill fs-5 me-2"></i>
            <div>
                Ubah data peminjaman dengan benar sebelum menyimpan pembaruan.
            </div>
        </div>

        <form method="post" action="pinjam_update.php">

            <input type="hidden" name="id" value="<?= $d['pinjam_id']; ?>">

            <!-- USER -->
            <div class="mb-3">
                <label class="form-label">Pilih User</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <select name="user" class="form-select" required>
                        <option value="">-- Pilih User --</option>
                        <?php 
                        $u = mysqli_query($koneksi,"SELECT * FROM user ORDER BY user_nama ASC");
                        while($x = mysqli_fetch_assoc($u)){ ?>
                            <option value="<?= $x['user_id']; ?>"
                                <?= $x['user_id'] == $d['user_id'] ? "selected" : ""; ?>>
                                <?= $x['user_nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- KENDARAAN -->
            <div class="mb-3">
                <label class="form-label">Pilih Kendaraan</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-car-front-fill"></i></span>
                    <select name="kendaraan" class="form-select" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        <?php 
                        $k = mysqli_query($koneksi,"SELECT * FROM kendaraan ORDER BY kendaraan_nama ASC");
                        while($x = mysqli_fetch_assoc($k)){ ?>
                            <option value="<?= $x['kendaraan_nomor']; ?>"
                                <?= $x['kendaraan_nomor'] == $d['kendaraan_nomor'] ? "selected" : ""; ?>>
                                <?= $x['kendaraan_nomor']; ?> - <?= $x['kendaraan_nama']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- TANGGAL PINJAM -->
            <div class="mb-3">
                <label class="form-label">Tanggal Pinjam</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                    <input type="date" name="pinjam" class="form-control" 
                        value="<?= $d['tgl_pinjam']; ?>" required>
                </div>
            </div>

            <!-- TANGGAL KEMBALI -->
            <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                    <input type="date" name="kembali" class="form-control" 
                        value="<?= $d['tgl_kembali']; ?>" required>
                </div>
            </div>

            <!-- STATUS -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-flag-fill"></i></span>
                    <select name="status" class="form-select" required>
                        <option value="1" <?= $d['pinjam_status']=="1" ? "selected" : ""; ?>>Ready</option>
                        <option value="2" <?= $d['pinjam_status']=="2" ? "selected" : ""; ?>>Dipinjam</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-modern">
                <i class="bi bi-save2 me-2"></i> Update Data
            </button>

        </form>

    </div>

    <div class="text-center text-muted py-2">
        <small><i class="bi bi-car-front-fill"></i> Sistem Rental — Edit Data</small>
    </div>

</div>
