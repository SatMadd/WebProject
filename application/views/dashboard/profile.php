<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= $title; ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: radial-gradient(circle at top, #1e1b4b, #020617);
    color: #f8fafc;
    font-family: 'Segoe UI', sans-serif;
}

.profile-card {
    background: linear-gradient(145deg, #020617, #020617cc);
    border-radius: 20px;
    padding: 35px;
    border: 1px solid #1e293b;
    box-shadow: 0 0 40px rgba(59,130,246,.2);
}

.form-control {
    background: #020617;
    border: 1px solid #1e293b;
    color: #f8fafc;
}

.form-control:focus {
    background: #020617;
    color: #fff;
    border-color: #7dd3fc;
    box-shadow: 0 0 0 0.15rem rgba(125,211,252,.25);
}

label {
    color: #cbd5f5;
}

.btn-save {
    background: linear-gradient(90deg, #38bdf8, #6366f1);
    border: none;
    font-weight: 600;
}

.btn-save:hover {
    opacity: .9;
}

.avatar {
    width: 90px;
    height: 90px;
    background: linear-gradient(145deg, #38bdf8, #6366f1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 38px;
    margin: auto;
    margin-bottom: 15px;
}
</style>
</head>

<body>

<div class="container py-5" style="max-width:520px;">

    <div class="profile-card">

        <div class="text-center mb-4">
            <div class="avatar">👤</div>
            <h4><?= htmlspecialchars($user['username']); ?></h4>
            <small class="text-secondary"><?= htmlspecialchars($user['email']); ?></small>
        </div>

        <!-- FLASH MESSAGE -->
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('profile/update'); ?>" method="POST">

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="username" class="form-control"
                       value="<?= htmlspecialchars($user['username']); ?>" required>
            </div>

            <hr class="border-secondary">

            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="password1" class="form-control"
                       placeholder="Kosongkan jika tidak diganti">
            </div>

            <div class="mb-4">
                <label>Konfirmasi Password</label>
                <input type="password" name="password2" class="form-control">
            </div>

            <button class="btn btn-save w-100 py-2">
                💾 Simpan Perubahan
            </button>
        </form>

        <a href="<?= base_url('dashboard'); ?>"
           class="btn btn-outline-light w-100 mt-3">
            ← Kembali ke Dashboard
        </a>

    </div>

</div>

</body>
</html>
