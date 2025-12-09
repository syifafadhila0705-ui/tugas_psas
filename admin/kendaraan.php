<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="container mt-4">

    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0">
                <i class="bi bi-truck-front-fill"></i> Data Kendaraan
            </h4>
            <a href="kendaraan_tambah.php" class="btn btn-light btn-sm fw-bold">
                <i class="bi bi-plus-circle"></i> Tambah Kendaraan
            </a>
        </div>

        <div class="card-body">

            <!-- Info Box -->
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i>
                <div>Daftar kendaraan yang tersedia pada sistem Rental Skanega.</div>
            </div>

            <table class="table table-bordered table-striped table-hover align-middle shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>No Kendaraan</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th class="text-center">Harga / Hari</th>
                        <th width="20%" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM kendaraan ORDER BY kendaraan_nomor ASC");
                    while ($d = mysqli_fetch_assoc($data)) {
                    ?>
                    <tr>
                        <td class="text-center fw-bold"><?= $no++; ?></td>

                        <td>
                            <span class="badge bg-secondary px-3 py-2 fs-6">
                                <?= $d['kendaraan_nomor']; ?>
                            </span>
                        </td>

                        <td class="fw-semibold"><?= $d['kendaraan_nama']; ?></td>

                        <td>
                            <span class="badge bg-info text-dark px-3 py-2">
                                <?= $d['kendaraan_tipe']; ?>
                            </span>
                        </td>

                        <td class="text-center fw-bold text-success">
                            Rp <?= number_format($d['kendaraan_harga_perhari']); ?>
                        </td>

                        <td class="text-center">
                            <a href="kendaraan_edit.php?id=<?= $d['kendaraan_nomor']; ?>" 
                               class="btn btn-warning btn-sm me-1">
                               <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <a href="kendaraan_hapus.php?id=<?= $d['kendaraan_nomor']; ?>" 
                               onclick="return confirm('Yakin ingin menghapus kendaraan ini?')" 
                               class="btn btn-danger btn-sm">
                               <i class="bi bi-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<?php include 'footer.php'; ?>
