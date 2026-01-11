<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= $title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: radial-gradient(circle at top, #0f172a, #020617);
    color: #f8fafc;
    min-height: 100vh;
}

.navbar {
    background: rgba(15,23,42,.9);
    backdrop-filter: blur(10px);
}

.stat-card {
    background: rgba(2,6,23,.85);
    border: 1px solid rgba(148,163,184,.15);
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 0 30px rgba(59,130,246,.15);
    transition: transform .3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
}

.stat-number {
    font-size: 2.8rem;
    font-weight: 700;
    color: #7dd3fc;
    text-shadow: 0 0 14px rgba(125,211,252,.6);
}

.stat-title {
    color: #e2e8f0;
    letter-spacing: .5px;
}

.action-card {
    background: rgba(15,23,42,.9);
    border-radius: 16px;
    border: 1px solid rgba(148,163,184,.15);
    padding: 30px;
    transition: .3s;
}

.action-card:hover {
    box-shadow: 0 0 40px rgba(99,102,241,.35);
}

.btn-glow {
    box-shadow: 0 0 20px rgba(99,102,241,.6);
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
<div class="container">
    <a class="navbar-brand fw-bold" href="#">🚀 Admin Panel</a>

    <div class="d-flex align-items-center">
        <span class="me-3 text-light">
            Halo, Admin!<strong><?= $this->session->userdata('username'); ?></strong>
        </span>
        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger btn-sm">Logout</a>
    </div>
</div>
</nav>

<!-- CONTENT -->
<div class="container py-5">

<!-- STAT CARDS -->
<div class="row g-4 mb-5">

    <div class="col-md-4">
        <div class="stat-card text-center">
            <div class="stat-number"><?= $total_users; ?></div>
            <div class="stat-title">Total Pengguna</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card text-center">
            <div class="stat-number"><?= $online_users; ?></div>
            <div class="stat-title">Pengguna Online</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card text-center">
            <div class="stat-number"><?= $articles; ?></div>
            <div class="stat-title">Total Artikel</div>
        </div>
    </div>

</div>

<!-- ACTIONS -->
<div class="row g-4">

    <div class="col-md-6">
        <div class="action-card h-100">
            <h4 class="mb-3">👥 Manajemen User</h4>
            <p class="text-light opacity-75">
                Kelola user, ban / unban akun, serta promote atau demote role user.
            </p>
            <a href="<?= base_url('admin/users'); ?>" class="btn btn-primary btn-glow">
                Kelola User →
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="action-card h-100">
            <h4 class="mb-3">✍️ Manajemen Artikel</h4>
            <p class="text-light opacity-75">
                Tambah, hapus, dan kelola artikel yang tampil di halaman user.
            </p>
            <a href="<?= base_url('admin/articles'); ?>" class="btn btn-success btn-glow">
                Kelola Artikel →
            </a>
        </div>
    </div>

</div>

</div>

</body>
</html>
