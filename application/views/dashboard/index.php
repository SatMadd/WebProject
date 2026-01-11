<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title><?= $title ?? 'Dashboard'; ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

.account-card {
    background: linear-gradient(135deg, rgba(2,6,23,.9), rgba(15,23,42,.95));
    border-radius: 20px;
    padding: 28px;
    border: 1px solid rgba(148,163,184,.18);
    box-shadow:
        inset 0 0 0 1px rgba(148,163,184,.05),
        0 0 40px rgba(59,130,246,.25);
}

.account-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #e5e7eb;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 24px;
}

.account-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 0;
    border-bottom: 1px dashed rgba(148,163,184,.2);
}

.account-item:last-child {
    border-bottom: none;
}

.account-label {
    color: #93c5fd;
    font-size: .9rem;
    letter-spacing: .4px;
}

.account-value {
    color: #f8fafc;
    font-weight: 500;
}

.role-badge {
    padding: 6px 14px;
    border-radius: 999px;
    font-size: .75rem;
    font-weight: 600;
    letter-spacing: .5px;
    background: linear-gradient(135deg, #38bdf8, #6366f1);
    color: #020617;
    box-shadow: 0 0 18px rgba(99,102,241,.6);
}
    
body {
    background: radial-gradient(circle at top, #1e1b4b, #020617);
    color: #f8fafc;
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
}

/* SIDEBAR */
.sidebar {
    width: 240px;
    background: linear-gradient(180deg, #020617, #020617cc);
    position: fixed;
    height: 100%;
    padding: 25px 15px;
    border-right: 1px solid #1e293b;
}

.sidebar h4 {
    color: #7dd3fc;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    padding: 12px 15px;
    margin-bottom: 10px;
    color: #e5e7eb;
    text-decoration: none;
    border-radius: 10px;
    transition: .3s;
}

.sidebar a:hover {
    background: #1e293b;
    color: #7dd3fc;
}

/* CONTENT */
.main {
    margin-left: 260px;
    padding: 40px;
}

/* GREETING */
.greeting {
    font-size: 28px;
    font-weight: bold;
    animation: fadeSlide 1.2s ease;
}

@keyframes fadeSlide {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

/* CARDS */
.stat-card {
    background: linear-gradient(145deg, #020617, #020617aa);
    border-radius: 20px;
    padding: 25px;
    border: 1px solid #1e293b;
    box-shadow: 0 0 40px rgba(59,130,246,.15);
}

.stat-number {
    font-size: 36px;
    font-weight: bold;
    color: #7dd3fc;
}

/* CHART */
.chart-card {
    background: linear-gradient(145deg, #020617, #020617aa);
    border-radius: 20px;
    padding: 25px;
    border: 1px solid #1e293b;
}

.table th {
    color: #7dd3fc;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>🚀 SpaceDash</h4>

    <a href="<?= base_url('dashboard/quiz'); ?>">🧠 Quiz</a>
    <a href="<?= base_url('dashboard/artikel'); ?>">📚 Artikel</a>
    <a href="<?= base_url('dashboard/profile'); ?>">👤 Profile</a>

    <?php if($user['role'] === 'admin'): ?>
        <a href="<?= base_url('admin'); ?>">🛠 Admin Panel</a>
    <?php endif; ?>

    <a href="<?= base_url('auth/logout'); ?>">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- GREETING -->
    <div class="greeting mb-4">
        Halo, <span style="color:#7dd3fc;">
            <?= htmlspecialchars($user['username']); ?>
        </span> 👋
    </div>

    <!-- STAT CARDS -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="stat-card">
                <h6>👥 Pengguna Aktif</h6>
                <div class="stat-number" id="activeUsers">128</div>
                <small class="text-secondary">Sedang online</small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="stat-card">
                <h6>🔁 Website Dibagikan</h6>
                <div class="stat-number">2.431</div>
                <small class="text-secondary">Total share</small>
            </div>
        </div>
    </div>

    <!-- CHART -->
    <div class="chart-card mb-5">
        <h5 class="mb-3">📊 Aktivitas Pengguna (Realtime)</h5>
        <canvas id="userChart" height="100"></canvas>
    </div>

    <!-- ACCOUNT INFO -->
    <div class="account-card mt-5">
    
    <div class="account-title">
        ℹ️ Informasi Akun
    </div>

    <div class="account-item">
        <div class="account-label">Username</div>
        <div class="account-value"><?= $user['username']; ?></div>
    </div>

    <div class="account-item">
        <div class="account-label">Email</div>
        <div class="account-value"><?= $user['email']; ?></div>
    </div>

    <div class="account-item">
        <div class="account-label">Role</div>
        <div class="account-value">
            <span class="role-badge">
                <?= ucfirst($user['role']); ?>
            </span>
        </div>
    </div>

    <div class="account-item">
        <div class="account-label">Mendaftar</div>
        <div class="account-value">
            <?= date('d F Y', strtotime($user['created_at'])); ?>
        </div>
    </div>

</div>

<!-- CHART SCRIPT -->
<script>
const ctx = document.getElementById('userChart');

const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Pengguna Aktif',
            data: [],
            borderColor: '#7dd3fc',
            backgroundColor: 'rgba(125,211,252,.25)',
            tension: .4,
            fill: true
        }]
    },
    options: {
        plugins: {
            legend: { labels: { color: '#f8fafc' } }
        },
        scales: {
            x: { ticks: { color: '#f8fafc' } },
            y: { ticks: { color: '#f8fafc' } }
        }
    }
});

// Fake realtime
setInterval(() => {
    const time = new Date().toLocaleTimeString();
    const value = Math.floor(Math.random() * 50) + 80;

    chart.data.labels.push(time);
    chart.data.datasets[0].data.push(value);

    if (chart.data.labels.length > 8) {
        chart.data.labels.shift();
        chart.data.datasets[0].data.shift();
    }

    document.getElementById('activeUsers').innerText = value;
    chart.update();
}, 2000);
</script>

</body>
</html>
