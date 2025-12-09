<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<style>
    /* Animasi Halus */
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
        font-size: 23px;
        font-weight: 600;
        margin: 0;
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

    .form-control, .form-select {
        padding: 11px;
        border-radius: 10px;
        border: 1px solid #cfd7e4;
        font-size: 15px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13,110,253,0.15);
    }

    .btn-modern {
        padding: 11px 26px;
        border-radius: 12px;
        font-size: 15px;
        transition: .25s;
        font-weight: 600;
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
        <h4><i class="bi bi-clipboard-plus me-2"></i> Tambah Peminjaman Kendaraan</h4>
    </div>

    <!-- BODY -->
    <div class="p-4">

        <!-- Box Info -->
        <div class="info-box d-flex">
            <i class="bi bi-info-circle-fill fs-5 me-2"></i>
            <div>
                Isi data peminjaman dengan benar. Pastikan tanggal dan status sesuai kondisi kendaraan.
            </div>
        </div>

        <form method="post" action="pinjam_tambah_aksi.php">

            <!-- USER -->
            <div class="mb-3">
                <label class="form-label">Pilih User</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <select name="user" class="form-select" required>
                        <option value="">-- Pilih User --</option>
                        <?php 
                        $u = mysqli_query($koneksi,"SELECT * FROM user ORDER BY user_nama ASC");
                        while($d = mysqli_fetch_assoc($u)){ ?>
                            <option value="<?= $d['user_id']; ?>">
                                <?= $d['user_nama']; ?>
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
                        while($d = mysqli_fetch_assoc($k)){ ?>
                            <option value="<?= $d['kendaraan_nomor']; ?>">
                                <?= $d['kendaraan_nomor']; ?> - <?= $d['kendaraan_nama']; ?>
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
                    <input type="date" name="pinjam" class="form-control" required>
                </div>
            </div>

            <!-- TANGGAL KEMBALI -->
            <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
                    <input type="date" name="kembali" class="form-control" required>
                </div>
            </div>

            <!-- STATUS -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-flag-fill"></i></span>
                    <select name="status" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="1">Ready</option>
                        <option value="2">Dipinjam</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-modern w-100">
                <i class="bi bi-save2 me-1"></i> Simpan Data
            </button>

        </form>

    </div>

    <div class="text-center text-muted py-2">
        <small><i class="bi bi-car-front-fill"></i> Sistem Rental — Form Peminjaman</small>
    </div>

</div>
