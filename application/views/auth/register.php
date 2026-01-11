<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ===== GLOBAL TEXT FIX ===== */
        body {
            color: #f8fafc;
        }

        /* ===== TITLE ===== */
        .register-title {
            color: #ffffff !important;
            font-weight: 700;
            text-shadow:
                0 0 12px rgba(147,197,253,.8),
                0 0 30px rgba(99,102,241,.6);
        }

        /* ===== SUBTITLE ===== */
        .register-subtitle {
            color: #e5e7eb !important;
            opacity: .95;
            text-shadow: 0 0 12px rgba(148,163,184,.4);
        }

        /* ===== LABEL & SMALL TEXT ===== */
        label,
        small {
            color: #f1f5f9 !important;
        }

        /* ===== BUTTON GLOW ===== */
        .btn-glow {
            background: linear-gradient(135deg, #38bdf8, #6366f1);
            border: none;
            color: #020617;
            font-weight: 600;
            box-shadow:
                0 0 20px rgba(99,102,241,.6),
                0 0 40px rgba(56,189,248,.4);
            transition: .3s ease;
        }

        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow:
                0 0 30px rgba(99,102,241,.9),
                0 0 60px rgba(56,189,248,.6);
        }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at top, #1e1b4b, #020617);
            overflow: hidden;
            color: #f1f5f9;
            font-family: 'Inter', system-ui, sans-serif;
        }

        /* ===== STARS ===== */
        .stars {
            position: fixed;
            inset: 0;
            background: url("https://www.transparenttextures.com/patterns/stardust.png");
            animation: moveStars 140s linear infinite;
            z-index: 0;
        }

        @keyframes moveStars {
            to { background-position: 12000px 6000px; }
        }

        /* ===== PLANETS ===== */
        .planet {
            position: absolute;
            border-radius: 50%;
        }

        .planet.big {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle at 30% 30%, #22d3ee, #1e3a8a);
            bottom: -140px;
            right: -140px;
            animation: float 12s ease-in-out infinite;
        }

        .planet.small {
            width: 130px;
            height: 130px;
            background: radial-gradient(circle at 30% 30%, #a78bfa, #4c1d95);
            top: 90px;
            left: 120px;
            animation: float 8s ease-in-out infinite;
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* ===== ASTEROID ===== */
        .asteroid {
            position: absolute;
            width: 20px;
            height: 20px;
            background: #94a3b8;
            border-radius: 50%;
            top: 30%;
            left: -60px;
            animation: asteroidMove 14s linear infinite;
            opacity: 0.5;
        }

        @keyframes asteroidMove {
            to { transform: translateX(120vw); }
        }

        /* ===== CARD ===== */
        .card-register {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 460px;
            background: rgba(15, 23, 42, 0.88);
            backdrop-filter: blur(16px);
            border-radius: 18px;
        }

        h3 {
            color: #ffffff;
            text-shadow: 0 0 14px rgba(147,197,253,0.3);
        }

        .form-label {
            color: #e2e8f0;
            font-weight: 500;
        }

        .form-control {
            background: #020617;
            border: 1px solid #334155;
            color: #f8fafc;
        }

        .form-control::placeholder {
            color: #94a3b8;
            opacity: 1;
        }

        .form-control:focus {
            background: #020617;
            color: #ffffff;
            border-color: #22d3ee;
            box-shadow:
                0 0 0 .15rem rgba(34,211,238,.25),
                0 0 18px rgba(34,211,238,.35);
        }

        .btn-primary {
            background: linear-gradient(135deg, #22d3ee, #3b82f6);
            border: none;
            border-radius: 12px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0ea5e9, #2563eb);
        }

        hr {
            border-color: #334155;
        }

        small, .text-muted {
            color: #cbd5f5 !important;
        }

        a {
            color: #7dd3fc;
            text-shadow: 0 0 8px rgba(125,211,252,0.35);
        }

        a:hover {
            color: #bae6fd;
        }
    </style>
</head>

<body>

<div class="stars"></div>

<!-- Decorations -->
<div class="planet big"></div>
<div class="planet small"></div>
<div class="asteroid"></div>

<!-- REGISTER -->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card card-register shadow-lg border-0">
        <div class="card-body p-5">

            <h3 class="text-center mb-4 fw-semibold">🪐 Registrasi Astronaut</h3>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger small">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/register'); ?>" method="POST">

                <div class="mb-3">
                    <label class="form-label">Nama Astronaut</label>
                    <input type="text" name="username" class="form-control"
                        placeholder="Nama lengkap"
                        value="<?= set_value('name'); ?>" required>
                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                        placeholder="astronaut@email.com"
                        value="<?= set_value('email'); ?>" required>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control"
                        placeholder="Minimal 6 karakter" required>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mt-3">
                    Daftar ke Galaksi
                </button>
            </form>

            <hr class="my-4">

            <div class="text-center">
                <small class="text-muted">
                    Sudah punya akun?
                    <a href="<?= base_url('auth/login'); ?>" class="text-decoration-none">
                        Login di sini
                    </a>
                </small>
            </div>

        </div>
    </div>
</div>

</body>
</html>
