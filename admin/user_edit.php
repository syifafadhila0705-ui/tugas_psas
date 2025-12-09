<?php 
include 'header.php'; 
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<style>
.card {
    border-radius: 14px;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(90deg, #0d6efd, #6610f2);
    padding: 18px;
}

.btn {
    padding: 10px 16px;
    border-radius: 10px;
    font-weight: 600;
    transition: .2s;
}

.btn:hover {
    transform: translateY(-2px);
}

.input-group-text {
    width: 45px;
    justify-content: center;
}

.form-control, .form-select {
    height: 48px;
    padding-left: 45px;
}
</style>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header text-white">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Edit User
            </h4>
        </div>

        <div class="card-body mt-2">

            <form method="post" action="user_update.php">

                <input type="hidden" name="id" value="<?= $d['user_id']; ?>">

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="bi bi-person-circle"></i>
                        </span>
                        <input 
                            type="text" 
                            name="username" 
                            class="form-control" 
                            value="<?= $d['username']; ?>"
                            placeholder="Masukkan username"
                            required
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password (Opsional)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-danger text-white">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control"
                            placeholder="Isi jika ingin mengganti password"
                        >
                    </div>
                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti password.</small>
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success text-white">
                            <i class="bi bi-person-bounding-box"></i>
                        </span>
                        <input 
                            type="text" 
                            name="nama" 
                            class="form-control"
                            value="<?= $d['user_nama']; ?>"
                            placeholder="Masukkan nama lengkap"
                            required
                        >
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <div class="input-group">
                        <span class="input-group-text bg-warning text-dark">
                            <i class="bi bi-geo-alt-fill"></i>
                        </span>
                        <input 
                            type="text" 
                            name="alamat" 
                            class="form-control"
                            value="<?= $d['user_alamat']; ?>"
                            placeholder="Masukkan alamat"
                            required
                        >
                    </div>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Status User</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark text-white">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>
                        <select name="status" class="form-select" required>
                            <option value="admin" <?= $d['user_status']=="admin" ? "selected" : "" ?>>Admin</option>
                            <option value="user" <?= $d['user_status']=="user" ? "selected" : "" ?>>User</option>
                        </select>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success shadow-sm">
                        <i class="bi bi-save"></i> Update
                    </button>

                    <a href="user.php" class="btn btn-secondary shadow-sm">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

<?php include 'footer.php'; ?>
