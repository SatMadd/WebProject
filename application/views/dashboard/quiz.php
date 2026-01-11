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

.quiz-card {
    background: linear-gradient(145deg, #020617, #020617cc);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid #1e293b;
    box-shadow: 0 0 40px rgba(59,130,246,.2);
}

.option {
    background: #020617;
    border: 1px solid #1e293b;
    border-radius: 12px;
    padding: 12px 15px;
    cursor: pointer;
    transition: .3s;
    margin-bottom: 12px;
}

.option:hover {
    background: #1e293b;
}

.option.active {
    border-color: #7dd3fc;
    box-shadow: 0 0 15px rgba(125,211,252,.4);
}

.timer {
    font-weight: bold;
    color: #7dd3fc;
}

.progress {
    height: 8px;
}
</style>
</head>

<body>

<div class="container py-5" style="max-width:700px;">

    <h2 class="mb-4">🧠 Quiz Luar Angkasa</h2>

    <div class="quiz-card">

        <div class="d-flex justify-content-between mb-3">
            <div>Soal <span id="current">1</span> / <span id="total">3</span></div>
            <div class="timer">⏱ <span id="time">30</span>s</div>
        </div>

        <div class="progress mb-4">
            <div class="progress-bar bg-info" id="progressBar" style="width: 0%"></div>
        </div>

        <h5 id="question" class="mb-4"></h5>

        <div id="options"></div>

        <button class="btn btn-info w-100 mt-3" id="nextBtn" disabled>
            Next Question →
        </button>

    </div>

    <a href="<?= base_url('dashboard'); ?>" class="btn btn-outline-light w-100 mt-4">
        ← Kembali ke Dashboard
    </a>

</div>

<script>
const quizData = [
    {
        question: "Planet terpanas di tata surya adalah?",
        options: ["Merkurius", "Venus", "Mars", "Jupiter"],
        answer: 1
    },
    {
        question: "Planet terbesar di tata surya adalah?",
        options: ["Saturnus", "Bumi", "Jupiter", "Neptunus"],
        answer: 2
    },
    {
        question: "Galaksi tempat kita tinggal bernama?",
        options: ["Andromeda", "Bima Sakti", "Sombrero", "Whirlpool"],
        answer: 1
    }
];

let currentQuestion = 0;
let score = 0;
let timer;
let timeLeft = 30;

const questionEl = document.getElementById('question');
const optionsEl = document.getElementById('options');
const nextBtn = document.getElementById('nextBtn');
const currentEl = document.getElementById('current');
const totalEl = document.getElementById('total');
const progressBar = document.getElementById('progressBar');
const timeEl = document.getElementById('time');

totalEl.innerText = quizData.length;

function loadQuestion() {
    clearInterval(timer);
    timeLeft = 30;
    timeEl.innerText = timeLeft;

    timer = setInterval(() => {
        timeLeft--;
        timeEl.innerText = timeLeft;
        if (timeLeft === 0) nextQuestion();
    }, 1000);

    nextBtn.disabled = true;
    optionsEl.innerHTML = "";

    const q = quizData[currentQuestion];
    questionEl.innerText = q.question;
    currentEl.innerText = currentQuestion + 1;
    progressBar.style.width = ((currentQuestion) / quizData.length) * 100 + "%";

    q.options.forEach((opt, index) => {
        const div = document.createElement('div');
        div.className = 'option';
        div.innerText = opt;

        div.onclick = () => {
            document.querySelectorAll('.option').forEach(o => o.classList.remove('active'));
            div.classList.add('active');
            nextBtn.disabled = false;

            if (index === q.answer) score++;
        };

        optionsEl.appendChild(div);
    });
}

function nextQuestion() {
    clearInterval(timer);
    currentQuestion++;

    if (currentQuestion < quizData.length) {
        loadQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    progressBar.style.width = "100%";
    questionEl.innerText = "🎉 Quiz Selesai!";
    optionsEl.innerHTML = `
        <div class="alert alert-info text-center">
            Skor kamu: <b>${score}</b> / ${quizData.length}
        </div>
    `;
    nextBtn.style.display = "none";
}

nextBtn.onclick = nextQuestion;

loadQuestion();
</script>

</body>
</html>
