<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Artikel • Space Facts</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
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

.sidebar h4 {
    color: #7dd3fc;
    margin-bottom: 30px;
}

/* CONTENT */
.main {
    margin-left: 260px;
    padding: 40px;
}

/* HEADER */
.page-title {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 10px;
}

.page-sub {
    color: #cbd5f5;
    margin-bottom: 40px;
}

/* ARTICLE CARD */
.article-card {
    background: linear-gradient(145deg, #020617, #020617aa);
    border-radius: 20px;
    padding: 25px;
    height: 100%;
    border: 1px solid #1e293b;
    box-shadow: 0 0 30px rgba(59,130,246,.15);
    transition: .4s;
    cursor: pointer;
}

.article-card:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 0 0 50px rgba(125,211,252,.35);
}

.article-card h5 {
    color: #7dd3fc;
}

.article-card p {
    color: #e5e7eb;
}

.badge-space {
    background: rgba(125,211,252,.15);
    color: #7dd3fc;
    border: 1px solid rgba(125,211,252,.3);
}

/* MODAL */
.modal-content {
    background: linear-gradient(145deg, #020617, #020617ee);
    border: 1px solid #1e293b;
    color: #f8fafc;
}

/* READ BAR */
#readProgress {
    position: fixed;
    top: 0;
    left: 0;
    height: 4px;
    background: linear-gradient(90deg, #7dd3fc, #38bdf8);
    width: 0%;
    z-index: 9999;
}
</style>
</head>

<body>

<div id="readProgress"></div>

<!-- SIDEBAR -->
<div class="sidebar">
    <h4>🚀 SpaceDash</h4>
    <a href="quiz">🧠 Quiz</a>
    <a href="artikel">📚 Artikel</a>
    <a href="profile">👤 Profile</a>
    <a href="<?= base_url('auth/logout'); ?>">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <div class="page-title">📚 Fun Fact Luar Angkasa</div>
    <div class="page-sub">
        Fakta-fakta menakjubkan tentang semesta yang bikin kamu sadar betapa kecilnya manusia 🌌
    </div>

    <div class="row g-4">

        <!-- ARTICLE 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="article-card" data-bs-toggle="modal" data-bs-target="#fact1">
                <span class="badge badge-space mb-2">🌍 Planet</span>
                <h5>Bumi Tidak Sepenuhnya Bulat</h5>
                <p>Bumi sedikit pepat di kutub karena rotasi cepatnya...</p>
            </div>
        </div>

        <!-- ARTICLE 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="article-card" data-bs-toggle="modal" data-bs-target="#fact2">
                <span class="badge badge-space mb-2">🌌 Galaksi</span>
                <h5>Galaksi Kita Bau Alkohol?</h5>
                <p>Awan gas di pusat galaksi mengandung etanol...</p>
            </div>
        </div>

        <!-- ARTICLE 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="article-card" data-bs-toggle="modal" data-bs-target="#fact3">
                <span class="badge badge-space mb-2">☀️ Matahari</span>
                <h5>Matahari Bersuara?</h5>
                <p>Getaran matahari menghasilkan gelombang suara...</p>
            </div>
        </div>

    </div>
</div>

<!-- MODAL 1 -->
<div class="modal fade" id="fact1" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-4">
      <h4>🌍 Bumi Tidak Sepenuhnya Bulat</h4>
      <p>
        Bumi berbentuk <b>oblate spheroid</b>, artinya lebih mengembung di bagian khatulistiwa
        dan sedikit pepat di kutub. Hal ini disebabkan oleh rotasi cepat bumi yang menciptakan
        gaya sentrifugal.
      </p>
    </div>
  </div>
</div>

<!-- MODAL 2 -->
<div class="modal fade" id="fact2" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-4">
      <h4>🌌 Galaksi Bau Alkohol</h4>
      <p>
        Awan gas Sagittarius B2 di pusat Bima Sakti mengandung <b>etanol</b> dalam jumlah besar.
        Jika bisa dicium, baunya mirip alkohol atau rum!
      </p>
    </div>
  </div>
</div>

<!-- MODAL 3 -->
<div class="modal fade" id="fact3" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content p-4">
      <h4>☀️ Matahari Menghasilkan Suara</h4>
      <p>
        Matahari bergetar dan menghasilkan gelombang tekanan yang bisa diterjemahkan
        menjadi suara dengan frekuensi sangat rendah—lebih rendah dari yang bisa
        didengar telinga manusia.
      </p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Reading progress bar
window.addEventListener('scroll', () => {
    const scrollTop = document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    document.getElementById('readProgress').style.width =
        (scrollTop / height) * 100 + '%';
});
</script>

</body>
</html>
