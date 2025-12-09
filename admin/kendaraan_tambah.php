<?php include 'header.php'; ?>

<style>
    /* Animasi fade */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Card premium */
    .card-elite {
        border-radius: 18px;
        overflow: hidden;
        animation: fadeInUp .7s ease;
        border: 1px solid rgba(255,255,255,0.25);
        backdrop-filter: blur(6px);
        background: rgba(255,255,255,0.85);
        box-shadow: 0 12px 35px rgba(0,0,0,0.12);
        transition: .35s;
        position: relative;
    }

    .card-elite:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(0,0,0,0.18);
    }

    /* Header glass + gradient */
    .elite-header {
        background: linear-gradient(135deg, #0059c9, #003b8a);
        padding: 35px;
        color: white;
        text-shadow: 0 3px 6px rgba(0,0,0,0.25);
        backdrop-filter: blur(4px);
    }

    .elite-header h4 {
        font-size: 26px;
        font-weight: 600;
    }

    /* Input premium */
    .input-group input,
    .input-group select {
        border-radius: 10px !important;
        transition: .25s;
    }

    .input-group input:focus,
    .input-group select:focus {
        box-shadow: 0 0 0 4px rgba(0,108,255,0.2);
        border-color: #0d6efd;
    }

    .input-group-text {
        background: #eef2f7;
        border-radius: 10px 0 0 10px !important;
        font-size: 18px;
        color: #0050b3;
    }

    /* Info Box */
    .info-banner {
        background: #e8f2ff;
        padding: 14px 18px;
        border-left: 4px solid #0d6efd;
        border-radius: 8px;
        margin-bottom: 22px;
        display: flex;
    }

    .info-banner i {
        font-size: 22px;
        margin-right: 10px;
        color: #0d6efd;
    }

    /* Pembatas Elegan */
    .section-title {
        font-weight: 600;
        margin-bottom: 10px;
        margin-top: 25px;
        font-size: 17px;
        color: #00397a;
    }

    .divider {
        height: 2px;
        width: 100%;
        background: linear-gradient(to right, #006aff, transparent);
        margin-bottom: 15px;
        border-radius: 5px;
    }

    /* Tombol modern */
    .btn-modern {
        padding: 11px 28px;
        border-radius: 10px;
        font-size: 16px;
        position: relative;
        overflow: hidden;
        transition: .3s;
    }

    .btn-modern:hover {
        transform: scale(1.06);
    }

    .btn-modern:active {
        transform: scale(0.97);
    }

    /* Ripple effect */
    .btn-modern::after {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        background: rgba(255,255,255,0.4);
        border-radius: 50%;
        opacity: 0;
        transition: .4s ease-out;
    }

    .btn-modern:active::after {
        width: 160px;
        height: 160px;
        opacity: .3;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: 0s;
    }
</style>

<div class="container mt-4">

    <div class="card card-elite">

        <!-- HEADER -->
        <div class="elite-header">
            <h4 class="mb-0">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Tambah Kendaraan Baru
            </h4>
        </div>

        <!-- BODY -->
        <div class="card-body p-4">

            <div class="info-banner">
                <i class="bi bi-info-circle-fill"></i>
                <div>
                    Pastikan data kendaraan benar & lengkap sebelum disimpan.
                </div>
            </div>

            <form method="post" action="kendaraan_tambah_aksi.php">

                <!-- TITLE -->
                <div class="section-title">Informasi Kendaraan</div>
                <div class="divider"></div>

                <!-- NOMOR KENDARAAN -->
                <div class="mb-3">
                    <label class="form-label">Nomor Kendaraan</label>
                    <div class="input-group" data-bs-toggle="tooltip" title="Contoh: B 1234 CD">
                        <span class="input-group-text"><i class="bi bi-upc"></i></span>
                        <input 
                            type="text" 
                            name="nomor" 
                            class="form-control" 
                            placeholder="B 1234 CD" 
                            required
                        >
                    </div>
                </div>

                <!-- NAMA KENDARAAN -->
                <div class="mb-3">
                    <label class="form-label">Nama Kendaraan</label>
                    <div class="input-group" data-bs-toggle="tooltip" title="Contoh: Avanza, Scoopy, PCX">
                        <span class="input-group-text"><i class="bi bi-car-front-fill"></i></span>
                        <input 
                            type="text" 
                            name="nama" 
                            class="form-control" 
                            placeholder="Avanza / Scoopy / PCX"
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
                            <option value="">-- Pilih Tipe --</option>
                            <option>Mobil</option>
                            <option>Motor</option>
                        </select>
                    </div>
                </div>

                <!-- HARGA -->
                <div class="mb-3">
                    <label class="form-label">Harga per Hari</label>
                    <div class="input-group" data-bs-toggle="tooltip" title="Contoh: 150000">
                        <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                        <input 
                            type="number" 
                            name="harga" 
                            class="form-control"
                            placeholder="150000"
                            required
                        >
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-modern">
                        <i class="bi bi-save"></i> Simpan
                    </button>

                    <a href="kendaraan.php" class="btn btn-secondary btn-modern ms-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>

        <!-- FOOTER -->
        <div class="card-footer text-center text-muted py-2">
            <small><i class="bi bi-car-front-fill"></i> Sistem Rental — Input Data Kendaraan</small>
        </div>

    </div>

</div>

<script>
    // Bootstrap tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    tooltipTriggerList.forEach(t => new bootstrap.Tooltip(t))
</script>

<?php include 'footer.php'; ?>
