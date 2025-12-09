<?php 
include 'header.php';
?>

<style>
/* Styling tambahan untuk mempercantik tampilan form */
.card {
    border-radius: 14px;
}

.form-control, .form-select {
    padding-left: 45px;
    height: 48px;
}

.input-group-text {
    width: 45px;
    justify-content: center;
}

.btn {
    padding: 10px 16px;
    font-weight: 600;
    border-radius: 10px;
    transition: 0.2s;
}

.btn:hover {
    transform: translateY(-2px);
}

.section-title {
    font-size: 26px;
    color: #0d6efd;
}
</style>

<div class="container mt-4">

    <h3 class="fw-bold mb-4 section-title">
        <i class="bi bi-person-plus-fill"></i> Tambah User Baru
    </h3>

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="post" action="user_aksi.php">

                <!-- Username -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="bi bi-person-circle"></i>
                        </span>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-danger text-white">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                </div>

                <!-- Nama Lengkap -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success text-white">
                            <i class="bi bi-person-bounding-box"></i>
                        </span>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <div class="input-group">
                        <span class="input-group-text bg-warning text-dark">
                            <i class="bi bi-geo-alt-fill"></i>
                        </span>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
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
                            <option value="">-- Pilih Status --</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2 shadow-sm">
                        <i class="bi bi-save"></i> Simpan
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
