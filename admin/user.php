<?php 
include 'header.php';
include '../koneksi.php';
?>

<style>
/* Styling tambahan untuk mempercantik tampilan */
.table-hover tbody tr:hover {
    background-color: #f6f6f6;
    transition: 0.2s;
}
.card {
    border-radius: 14px;
}
.badge {
    font-size: 13px;
    padding: 6px 10px;
}
.table thead th {
    position: sticky;
    top: 0;
    z-index: 10;
}
.search-box {
    width: 250px;
}
</style>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">
            <i class="bi bi-people-fill"></i> Manajemen User
        </h3>

        <a href="user_tambah.php" class="btn btn-primary shadow-sm">
            <i class="bi bi-person-plus-fill"></i> Tambah User
        </a>
    </div>

    <div class="card shadow">

        <div class="card-body">

            <!-- Search Box -->
            <div class="d-flex justify-content-end mb-3">
                <input type="text" id="searchInput" 
                       class="form-control search-box" 
                       placeholder="Cari user...">
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover align-middle" id="userTable">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th width="18%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        $no = 1;
                        $data = mysqli_query($koneksi,"SELECT * FROM user");
                        while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $d['username']; ?></td>
                            <td><?= $d['user_nama']; ?></td>
                            <td><?= $d['user_alamat']; ?></td>

                            <td>
                                <?php if($d['user_status'] == "admin"){ ?>
                                    <span class="badge bg-success">
                                        <i class="bi bi-shield-check"></i> Admin
                                    </span>
                                <?php } else { ?>
                                    <span class="badge bg-secondary">
                                        <i class="bi bi-person"></i> User
                                    </span>
                                <?php } ?>
                            </td>

                            <td>
                                <a href="user_edit.php?id=<?= $d['user_id']; ?>" 
                                   class="btn btn-warning btn-sm me-1"
                                   data-bs-toggle="tooltip" 
                                   title="Edit User">
                                   <i class="bi bi-pencil-square"></i>
                                </a>

                                <a onclick="return confirm('Hapus user ini?')" 
                                   href="user_hapus.php?id=<?= $d['user_id']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   data-bs-toggle="tooltip"
                                   title="Hapus User">
                                   <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<script>
// Live search untuk memfilter tabel secara langsung
document.getElementById("searchInput").addEventListener("keyup", function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#userTable tbody tr");

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
});

// Tooltip Bootstrap
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
tooltipTriggerList.forEach(t => new bootstrap.Tooltip(t))
</script>

<?php include 'footer.php'; ?>
