<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: radial-gradient(circle at top, #1e1b4b, #020617);
            overflow: hidden;
            color: #e5e7eb;
            font-family: 'Inter', system-ui, sans-serif;
            h3 {
                color: #ffffff;
                text-shadow: 0 0 12px rgba(147,197,253,0.25);
            }
            .form-label {
                color: #e2e8f0;
                font-weight: 500;
            }
            .form-control {
                color: #f8fafc;
            }
            .form-control::placeholder {
                color: #94a3b8;
                opacity: 1;
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
            /* Alert text */
            .alert {
                color: #f8fafc;
            }
        }

        /* ===== STARS ===== */
        .stars {
            position: fixed;
            inset: 0;
            background: url("https://www.transparenttextures.com/patterns/stardust.png");
            animation: moveStars 120s linear infinite;
            z-index: 0;
        }

        @keyframes moveStars {
            from { background-position: 0 0; }
            to { background-position: 10000px 5000px; }
        }

        /* ===== PLANETS ===== */
        .planet {
            position: absolute;
            border-radius: 50%;
            filter: blur(0.3px);
        }

        .planet.big {
            width: 280px;
            height: 280px;
            background: radial-gradient(circle at 30% 30%, #7c3aed, #312e81);
            bottom: -120px;
            left: -120px;
            animation: float 10s ease-in-out infinite;
        }

        .planet.small {
            width: 120px;
            height: 120px;
            background: radial-gradient(circle at 30% 30%, #38bdf8, #1e3a8a);
            top: 80px;
            right: 120px;
            animation: float 7s ease-in-out infinite;
        }

        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-18px); }
        }

        /* ===== ROCKET ===== */
        .rocket {
            position: absolute;
            width: 60px;
            left: 10%;
            bottom: -80px;
            animation: launch 18s linear infinite;
            opacity: 0.85;
        }

        @keyframes launch {
            0% {
                transform: translateY(0) rotate(-20deg);
                opacity: 0;
            }
            10% { opacity: 1; }
            100% {
                transform: translate(600px, -900px) rotate(-20deg);
                opacity: 0;
            }
        }

        /* ===== ASTEROID ===== */
        .asteroid {
            position: absolute;
            width: 18px;
            height: 18px;
            background: #64748b;
            border-radius: 50%;
            top: 20%;
            left: -50px;
            animation: asteroidMove 12s linear infinite;
            opacity: 0.6;
        }

        @keyframes asteroidMove {
            to {
                transform: translateX(120vw);
            }
        }

        /* ===== LOGIN CARD ===== */
        .card-login {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 420px;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(14px);
            border-radius: 18px;
        }

        .form-control {
            background: #020617;
            border: 1px solid #334155;
            color: #e5e7eb;
        }

        .form-control:focus {
            background: #020617;
            color: #fff;
            border-color: #38bdf8;
            box-shadow: 0 0 0 .15rem rgba(56,189,248,.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            border: none;
            border-radius: 10px;
        }

        hr {
            border-color: #334155;
        }

        a {
            color: #7dd3fc;
        }
    </style>
</head>

<body>

<div class="stars"></div>

<!-- Decorative Objects -->
<div class="planet big"></div>
<div class="planet small"></div>

<img 
    src="https://cdn-icons-png.flaticon.com/512/3212/3212608.png" 
    class="rocket" 
    alt="rocket">

<div class="asteroid"></div>

<!-- LOGIN -->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card card-login shadow-lg border-0">
        <div class="card-body p-5">

            <h3 class="text-center mb-4 fw-semibold">🚀 Selamat Datang Astronaut</h3>

            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger small">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('auth/login'); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="astronaut@email.com" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mt-3">
                    Masuk ke Galaksi
                </button>
            </form>

            <hr class="my-4">

            <div class="text-center">
                <small class="text-muted">
                    Belum punya akun?
                    <a href="<?= base_url('auth/register'); ?>" class="text-decoration-none">
                        Daftar Sekarang
                    </a>
                </small>
            </div>

        </div>
    </div>
</div>

</body>
</html>
