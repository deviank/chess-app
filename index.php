<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chess Basics | Chess App</title>
    <style>
:root {
    --bg: #f5f7fb;
    --surface: #ffffff;
    --surface-strong: #eef3ff;
    --text: #152033;
    --muted: #647086;
    --primary: #4f46e5;
    --primary-dark: #3730a3;
    --danger: #dc2626;
    --success: #15803d;
    --border: #dce3f0;
    --shadow: 0 18px 50px rgba(31, 41, 55, 0.12);
    --radius: 22px;
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    background:
        radial-gradient(circle at top left, rgba(79, 70, 229, 0.16), transparent 32rem),
        linear-gradient(180deg, #f8fbff 0%, var(--bg) 100%);
    color: var(--text);
    font-family: Arial, Helvetica, sans-serif;
    line-height: 1.5;
}

button {
    font: inherit;
}

.site-header {
    padding: 24px clamp(18px, 4vw, 56px) 24px;
}

.nav,
.hero,
.container {
    max-width: 1120px;
    margin: 0 auto;
}

.nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.brand {
    color: var(--primary-dark);
    font-size: 1.2rem;
    font-weight: 800;
    text-decoration: none;
}

.hero {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 280px;
    gap: 28px;
    align-items: center;
    padding: 18px clamp(18px, 4vw, 56px) 34px;
}

.hero h1 {
    max-width: 720px;
    margin: 0;
    font-size: clamp(2.4rem, 7vw, 5rem);
    line-height: 0.96;
    letter-spacing: -0.06em;
}

.hero-copy,
.lesson-panel p {
    color: var(--muted);
}

.hero-panel,
.game-shell,
.stat-card,
.lesson-panel {
    border: 1px solid var(--border);
    border-radius: var(--radius);
    background: rgba(255, 255, 255, 0.9);
    box-shadow: var(--shadow);
}

.hero-panel {
    padding: 28px;
    text-align: center;
}

.hero-number {
    display: block;
    color: var(--primary);
    font-size: 2.6rem;
    font-weight: 900;
    line-height: 1;
}

.hero-label,
.eyebrow,
.stat-label {
    color: var(--muted);
    font-size: 0.76rem;
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.container {
    padding: 0 clamp(18px, 4vw, 56px) 56px;
}

.game-shell {
    padding: clamp(20px, 4vw, 34px);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
    margin-bottom: 20px;
}

.stat-card {
    box-shadow: none;
    padding: 14px;
}

.stat-label,
.stat-value {
    display: block;
}

.stat-value {
    font-size: 1.6rem;
    font-weight: 900;
}

.toolbar {
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 18px;
}

.button,
.secondary-button {
    display: inline-flex;
    min-height: 42px;
    align-items: center;
    justify-content: center;
    border: 0;
    border-radius: 999px;
    cursor: pointer;
    font-weight: 800;
    padding: 10px 18px;
}

.button {
    background: var(--primary);
    color: #ffffff;
    box-shadow: 0 10px 24px rgba(79, 70, 229, 0.3);
}

.secondary-button,
.status-pill {
    background: var(--surface-strong);
    color: var(--primary-dark);
}

.status-pill {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    font-size: 0.88rem;
    font-weight: 800;
    padding: 8px 12px;
}

.chess-layout {
    display: grid;
    grid-template-columns: minmax(280px, 520px) minmax(260px, 1fr);
    gap: 24px;
    align-items: start;
}

.chess-board {
    display: grid;
    grid-template-columns: repeat(8, minmax(30px, 1fr));
    overflow: hidden;
    border: 2px solid var(--text);
    border-radius: 18px;
    background: var(--text);
}

.chess-square {
    position: relative;
    display: grid;
    aspect-ratio: 1;
    min-height: 48px;
    place-items: center;
    border: 0;
    color: var(--text);
    cursor: pointer;
    font-weight: 900;
}

.chess-square.light {
    background: #f0d9b5;
}

.chess-square.dark {
    background: #b58863;
}

.chess-square.is-selected {
    outline: 4px solid var(--primary);
    outline-offset: -4px;
}

.chess-square.is-move::after {
    width: 34%;
    height: 34%;
    border-radius: 999px;
    background: rgba(20, 184, 166, 0.7);
    content: "";
}

.chess-piece {
    display: grid;
    width: 72%;
    height: 72%;
    place-items: center;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.78);
    box-shadow: 0 8px 16px rgba(31, 41, 55, 0.18);
    font-size: clamp(1rem, 3vw, 1.8rem);
}

.lesson-panel {
    padding: 22px;
}

.lesson-panel h2,
.quiz-card h3 {
    margin: 0 0 10px;
}

.piece-list,
.quiz-options {
    display: grid;
    gap: 10px;
}

.piece-list {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    margin: 18px 0;
}

.piece-button,
.quiz-option {
    min-height: 44px;
    border: 1px solid var(--border);
    border-radius: 14px;
    background: var(--surface-strong);
    color: var(--primary-dark);
    cursor: pointer;
    font-weight: 800;
    padding: 10px 12px;
    text-align: left;
}

.piece-button.is-active,
.quiz-option:hover {
    border-color: var(--primary);
    background: #e0e7ff;
}

.quiz-card {
    border-top: 1px solid var(--border);
    margin-top: 18px;
    padding-top: 18px;
}

.feedback {
    min-height: 28px;
    color: var(--muted);
    font-weight: 800;
}

.feedback.success {
    color: var(--success);
}

.feedback.danger {
    color: var(--danger);
}

.toast {
    position: fixed;
    right: 18px;
    bottom: 18px;
    z-index: 10;
    max-width: 320px;
    border-radius: 16px;
    background: var(--text);
    color: #ffffff;
    padding: 12px 16px;
    box-shadow: var(--shadow);
}

@media (max-width: 820px) {
    .hero,
    .stats-grid,
    .chess-layout {
        grid-template-columns: 1fr;
    }

    .hero-panel {
        text-align: left;
    }
}

    </style>
</head>
<body>
    <header class="site-header">
        <nav class="nav">
            <a class="brand" href="index.php">Chess App</a>
        </nav>
    </header>

    <main class="container">
        <section class="hero">
            <div>
                <p class="eyebrow">Beginner chess</p>
                <h1>Learn chess from zero.</h1>
                <p class="hero-copy">
                    Start with the board and piece movement. Select a piece to see where it
                    can move, then answer short practice questions to build confidence.
                </p>
            </div>
            <div class="hero-panel">
                <span class="hero-number" data-best-score="chess">-</span>
                <span class="hero-label">best quiz score</span>
            </div>
        </section>

        <section class="game-shell">
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-label">Question</span>
                    <span class="stat-value" data-question-count>0/0</span>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Correct</span>
                    <span class="stat-value" data-correct>0</span>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Score</span>
                    <span class="stat-value" data-score>0</span>
                </div>
                <div class="stat-card">
                    <span class="stat-label">Saved Scores</span>
                    <span class="stat-value" data-total-sessions>0</span>
                </div>
            </div>

            <div class="chess-layout">
                <div>
                    <div class="toolbar">
                        <button class="button" type="button" data-new-quiz>New quiz</button>
                        <button class="secondary-button" type="button" data-show-all>Show all moves</button>
                        <span class="status-pill" data-status>Select a piece on the board.</span>
                    </div>
                    <div class="chess-board" data-board aria-label="Chess practice board"></div>
                </div>

                <aside class="lesson-panel">
                    <h2 data-piece-title>Learn the pieces</h2>
                    <p data-piece-description>
                        Click a piece to learn how it moves. The highlighted squares show
                        possible moves from this practice position.
                    </p>

                    <div class="piece-list" data-piece-list></div>

                    <div class="quiz-card">
                        <p class="eyebrow">Practice question</p>
                        <h3 data-question>Press New quiz to begin.</h3>
                        <div class="quiz-options" data-options></div>
                        <p class="feedback" data-feedback></p>
                    </div>
                </aside>
            </div>
        </section>
    </main>

    <script>
(function () {
    const STORAGE_KEY = 'chessAppScores';

    function getScores() {
        try {
            return JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
        } catch (error) {
            return [];
        }
    }

    function setScores(scores) {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(scores));
    }

    function getBestScore(game) {
        return getScores()
            .filter((entry) => entry.game === game)
            .sort((a, b) => Number(b.score) - Number(a.score))[0] || null;
    }

    function saveLocalScore(entry) {
        const cleanEntry = {
            game: entry.game,
            score: Number(entry.score),
            details: entry.details || {},
            createdAt: new Date().toISOString(),
        };
        const scores = getScores();
        scores.push(cleanEntry);
        setScores(scores.slice(-100));
        renderScoreSummary();
        return cleanEntry;
    }

    function formatScore(entry) {
        return entry ? `${entry.score} pts` : '-';
    }

    function recordScore(entry) {
        const previousBest = getBestScore(entry.game);
        const saved = saveLocalScore(entry);

        if (!previousBest || Number(saved.score) > Number(previousBest.score)) {
            showToast(`New best score: ${formatScore(saved)}`);
        } else {
            showToast(`Score saved: ${formatScore(saved)}`);
        }

        return saved;
    }

    function renderScoreSummary() {
        document.querySelectorAll('[data-best-score]').forEach((element) => {
            const best = getBestScore(element.dataset.bestScore);
            element.textContent = formatScore(best);
        });

        const totalSessions = document.querySelector('[data-total-sessions]');
        if (totalSessions) {
            totalSessions.textContent = getScores().length.toString();
        }
    }

    function showToast(message) {
        const existing = document.querySelector('.toast');
        if (existing) {
            existing.remove();
        }

        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.setAttribute('role', 'status');
        toast.textContent = message;
        document.body.appendChild(toast);

        window.setTimeout(() => {
            toast.remove();
        }, 3600);
    }

    window.MemoryTrainer = {
        getBestScore,
        getScores,
        recordScore,
        renderScoreSummary,
        showToast,
    };

    document.addEventListener('DOMContentLoaded', renderScoreSummary);
})();

    </script>
    <script>
(function () {
    const files = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    const ranks = [8, 7, 6, 5, 4, 3, 2, 1];
    const pieces = {
        king: {
            label: 'King',
            mark: 'K',
            start: 'e4',
            description: 'The king moves one square in any direction. Protecting it is the main goal of chess.',
        },
        queen: {
            label: 'Queen',
            mark: 'Q',
            start: 'd4',
            description: 'The queen moves any number of squares in a straight line: forward, backward, sideways, or diagonal.',
        },
        rook: {
            label: 'Rook',
            mark: 'R',
            start: 'a1',
            description: 'The rook moves any number of squares horizontally or vertically.',
        },
        bishop: {
            label: 'Bishop',
            mark: 'B',
            start: 'c1',
            description: 'The bishop moves any number of squares diagonally.',
        },
        knight: {
            label: 'Knight',
            mark: 'N',
            start: 'g1',
            description: 'The knight moves in an L shape: two squares one way, then one square sideways. It can jump over pieces.',
        },
        pawn: {
            label: 'Pawn',
            mark: 'P',
            start: 'e2',
            description: 'A pawn moves forward one square, can move two squares from its starting square, and captures diagonally.',
        },
    };

    const quizQuestions = [
        {
            prompt: 'Which piece moves in an L shape and can jump over pieces?',
            answer: 'Knight',
            options: ['Knight', 'Bishop', 'Rook', 'Pawn'],
        },
        {
            prompt: 'Which piece moves diagonally across the board?',
            answer: 'Bishop',
            options: ['King', 'Bishop', 'Rook', 'Pawn'],
        },
        {
            prompt: 'Which piece moves horizontally and vertically any number of squares?',
            answer: 'Rook',
            options: ['Rook', 'Knight', 'Pawn', 'King'],
        },
        {
            prompt: 'Which piece is the most important to protect?',
            answer: 'King',
            options: ['Queen', 'King', 'Bishop', 'Rook'],
        },
        {
            prompt: 'Which square can the knight on g1 move to?',
            answer: 'f3',
            options: ['g2', 'g4', 'f3', 'h1'],
        },
        {
            prompt: 'Which square can the pawn on e2 move to at the start?',
            answer: 'e4',
            options: ['e4', 'e1', 'd2', 'f2'],
        },
        {
            prompt: 'Which piece combines rook and bishop movement?',
            answer: 'Queen',
            options: ['Queen', 'King', 'Knight', 'Pawn'],
        },
        {
            prompt: 'Which square can the king on e4 move to?',
            answer: 'e5',
            options: ['e6', 'g5', 'e5', 'h4'],
        },
    ];

    const board = document.querySelector('[data-board]');
    const pieceList = document.querySelector('[data-piece-list]');
    const title = document.querySelector('[data-piece-title]');
    const description = document.querySelector('[data-piece-description]');
    const statusElement = document.querySelector('[data-status]');
    const showAllButton = document.querySelector('[data-show-all]');
    const newQuizButton = document.querySelector('[data-new-quiz]');
    const questionElement = document.querySelector('[data-question]');
    const optionsElement = document.querySelector('[data-options]');
    const feedback = document.querySelector('[data-feedback]');
    const questionCount = document.querySelector('[data-question-count]');
    const correctElement = document.querySelector('[data-correct]');
    const scoreElement = document.querySelector('[data-score]');

    let selectedPiece = 'king';
    let highlightedSquares = [];
    let quiz = [];
    let currentQuestion = 0;
    let correct = 0;
    let score = 0;
    let answered = false;

    function squareToCoords(square) {
        return {
            file: files.indexOf(square[0]) + 1,
            rank: Number(square[1]),
        };
    }

    function coordsToSquare(file, rank) {
        if (file < 1 || file > 8 || rank < 1 || rank > 8) {
            return null;
        }

        return `${files[file - 1]}${rank}`;
    }

    function rayMoves(start, directions, limit) {
        const origin = squareToCoords(start);
        const moves = [];

        directions.forEach(([fileStep, rankStep]) => {
            for (let distance = 1; distance <= limit; distance += 1) {
                const square = coordsToSquare(
                    origin.file + (fileStep * distance),
                    origin.rank + (rankStep * distance)
                );

                if (!square) {
                    break;
                }

                moves.push(square);
            }
        });

        return moves;
    }

    function movesFor(pieceKey) {
        const start = pieces[pieceKey].start;

        if (pieceKey === 'king') {
            return rayMoves(start, [
                [1, 0], [-1, 0], [0, 1], [0, -1],
                [1, 1], [1, -1], [-1, 1], [-1, -1],
            ], 1);
        }

        if (pieceKey === 'queen') {
            return rayMoves(start, [
                [1, 0], [-1, 0], [0, 1], [0, -1],
                [1, 1], [1, -1], [-1, 1], [-1, -1],
            ], 7);
        }

        if (pieceKey === 'rook') {
            return rayMoves(start, [[1, 0], [-1, 0], [0, 1], [0, -1]], 7);
        }

        if (pieceKey === 'bishop') {
            return rayMoves(start, [[1, 1], [1, -1], [-1, 1], [-1, -1]], 7);
        }

        if (pieceKey === 'knight') {
            const origin = squareToCoords(start);
            return [
                [1, 2], [2, 1], [2, -1], [1, -2],
                [-1, -2], [-2, -1], [-2, 1], [-1, 2],
            ]
                .map(([fileStep, rankStep]) => coordsToSquare(origin.file + fileStep, origin.rank + rankStep))
                .filter(Boolean);
        }

        if (pieceKey === 'pawn') {
            const origin = squareToCoords(start);
            return [
                coordsToSquare(origin.file, origin.rank + 1),
                coordsToSquare(origin.file, origin.rank + 2),
                coordsToSquare(origin.file - 1, origin.rank + 1),
                coordsToSquare(origin.file + 1, origin.rank + 1),
            ].filter(Boolean);
        }

        return [];
    }

    function pieceAt(square) {
        return Object.entries(pieces).find(([, piece]) => piece.start === square);
    }

    function renderBoard() {
        board.innerHTML = '';

        ranks.forEach((rank) => {
            files.forEach((file, fileIndex) => {
                const squareName = `${file}${rank}`;
                const square = document.createElement('button');
                const squareColor = (fileIndex + rank) % 2 === 0 ? 'dark' : 'light';
                square.type = 'button';
                square.className = `chess-square ${squareColor}`;
                square.dataset.square = squareName;
                square.setAttribute('aria-label', squareName);

                const pieceEntry = pieceAt(squareName);
                if (pieceEntry) {
                    const [pieceKey, piece] = pieceEntry;
                    const pieceElement = document.createElement('span');
                    pieceElement.className = 'chess-piece';
                    pieceElement.textContent = piece.mark;
                    pieceElement.title = piece.label;
                    square.appendChild(pieceElement);
                    square.dataset.piece = pieceKey;
                }

                if (pieceEntry && pieceEntry[0] === selectedPiece) {
                    square.classList.add('is-selected');
                }

                if (highlightedSquares.includes(squareName)) {
                    square.classList.add('is-move');
                }

                square.addEventListener('click', () => {
                    if (square.dataset.piece) {
                        selectPiece(square.dataset.piece);
                    }
                });

                board.appendChild(square);
            });
        });
    }

    function renderPieceButtons() {
        pieceList.innerHTML = '';

        Object.entries(pieces).forEach(([pieceKey, piece]) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = pieceKey === selectedPiece ? 'piece-button is-active' : 'piece-button';
            button.textContent = `${piece.mark} ${piece.label}`;
            button.addEventListener('click', () => selectPiece(pieceKey));
            pieceList.appendChild(button);
        });
    }

    function selectPiece(pieceKey) {
        selectedPiece = pieceKey;
        const piece = pieces[pieceKey];
        highlightedSquares = movesFor(pieceKey);
        title.textContent = `${piece.label} (${piece.mark})`;
        description.textContent = piece.description;
        statusElement.textContent = `${piece.label} selected. Highlighted squares show practice moves.`;
        renderPieceButtons();
        renderBoard();
    }

    function shuffle(items) {
        return [...items].sort(() => Math.random() - 0.5);
    }

    function startQuiz() {
        quiz = shuffle(quizQuestions).slice(0, 6);
        currentQuestion = 0;
        correct = 0;
        score = 0;
        answered = false;
        updateQuizStats();
        renderQuestion();
    }

    function updateQuizStats() {
        questionCount.textContent = quiz.length ? `${Math.min(currentQuestion + 1, quiz.length)}/${quiz.length}` : '0/0';
        correctElement.textContent = correct.toString();
        scoreElement.textContent = score.toString();
    }

    function renderQuestion() {
        if (currentQuestion >= quiz.length) {
            finishQuiz();
            return;
        }

        answered = false;
        feedback.textContent = '';
        feedback.className = 'feedback';
        const question = quiz[currentQuestion];
        questionElement.textContent = question.prompt;
        optionsElement.innerHTML = '';

        question.options.forEach((option) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'quiz-option';
            button.textContent = option;
            button.addEventListener('click', () => answerQuestion(option));
            optionsElement.appendChild(button);
        });

        updateQuizStats();
    }

    function answerQuestion(option) {
        if (answered) {
            return;
        }

        answered = true;
        const question = quiz[currentQuestion];
        const isCorrect = option === question.answer;

        if (isCorrect) {
            correct += 1;
            score += 10;
            feedback.className = 'feedback success';
            feedback.textContent = 'Correct.';
        } else {
            feedback.className = 'feedback danger';
            feedback.textContent = `Not quite. The answer is ${question.answer}.`;
        }

        currentQuestion += 1;
        updateQuizStats();
        window.setTimeout(renderQuestion, 1200);
    }

    function finishQuiz() {
        questionCount.textContent = `${quiz.length}/${quiz.length}`;
        questionElement.textContent = 'Quiz complete.';
        optionsElement.innerHTML = '';
        feedback.className = correct >= 4 ? 'feedback success' : 'feedback';
        feedback.textContent = `You scored ${score} points with ${correct}/${quiz.length} correct answers.`;

        if (quiz.length) {
            MemoryTrainer.recordScore({
                game: 'chess',
                score,
                details: {
                    correct,
                    total: quiz.length,
                },
            });
        }
    }

    function showAllMoves() {
        highlightedSquares = Object.keys(pieces).flatMap(movesFor);
        statusElement.textContent = 'Showing all practice move squares for all pieces.';
        renderBoard();
    }

    showAllButton.addEventListener('click', showAllMoves);
    newQuizButton.addEventListener('click', startQuiz);
    document.addEventListener('DOMContentLoaded', () => {
        renderPieceButtons();
        selectPiece('king');
    });
})();

    </script>
</body>
</html>

