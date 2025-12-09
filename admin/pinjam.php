<?php include 'header.php'; ?>
<?php include '../koneksi.php'; ?>

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Pinjam Kendaraan</h4>
            <a href="pinjam_tambah.php" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Pinjam
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama User</th>
                        <th>Kendaraan</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no=1;
                    $q = mysqli_query($koneksi,"
                        SELECT pinjam.*, user.user_nama, kendaraan.kendaraan_nama
                        FROM pinjam
                        JOIN user ON pinjam.user_id = user.user_id
                        JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                        ORDER BY pinjam_id DESC
                    ");

                    while($d = mysqli_fetch_assoc($q)){
                        $status_badge = $d['pinjam_status']==1
                            ? "<span class='badge bg-success'>Ready</span>"
                            : "<span class='badge bg-danger'>Dipinjam</span>";
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['user_nama']; ?></td>
                        <td><?= $d['kendaraan_nama']; ?></td>
                        <td><?= $d['tgl_pinjam']; ?></td>
                        <td><?= $d['tgl_kembali']; ?></td>
                        <td><?= $status_badge; ?></td>
                        <td>
                            <a href="pinjam_edit.php?id=<?= $d['pinjam_id']; ?>" 
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <a href="pinjam_hapus.php?id=<?= $d['pinjam_id']; ?>" 
                               onclick="return confirm('Hapus data pinjam ini?')" 
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
