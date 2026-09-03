<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#4f46e5">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Chess">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>Chess Basics | Chess App</title>
    <link rel="icon" type="image/png" sizes="192x192" href="assets/icon-192.png">
    <link rel="apple-touch-icon" href="assets/apple-touch-icon.png">
    <link rel="manifest" href="manifest.json">
    <style>
:root {
    --bg: #f4f6fb;
    --surface: #ffffff;
    --surface-strong: #eef2ff;
    --text: #152033;
    --muted: #647086;
    --primary: #4f46e5;
    --primary-dark: #3730a3;
    --danger: #dc2626;
    --success: #15803d;
    --border: #dce3f0;
    --shadow: 0 10px 28px rgba(31, 41, 55, 0.1);
    --radius: 18px;
    --header-h: 56px;
    --tab-h: 64px;
    --space: 16px;
    --tap: 48px;
    --safe-top: env(safe-area-inset-top, 0px);
    --safe-bottom: env(safe-area-inset-bottom, 0px);
    --safe-left: env(safe-area-inset-left, 0px);
    --safe-right: env(safe-area-inset-right, 0px);
}

* {
    box-sizing: border-box;
}

html {
    -webkit-text-size-adjust: 100%;
}

body {
    margin: 0;
    min-height: 100dvh;
    background:
        radial-gradient(circle at top left, rgba(79, 70, 229, 0.14), transparent 22rem),
        linear-gradient(180deg, #f8fbff 0%, var(--bg) 100%);
    color: var(--text);
    font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
    line-height: 1.45;
}

button,
select,
textarea {
    font: inherit;
    touch-action: manipulation;
}

button {
    -webkit-tap-highlight-color: transparent;
}

.app-header {
    position: sticky;
    top: 0;
    z-index: 30;
    display: flex;
    min-height: calc(var(--header-h) + var(--safe-top));
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: calc(10px + var(--safe-top)) max(var(--space), var(--safe-right)) 10px max(var(--space), var(--safe-left));
    border-bottom: 1px solid rgba(220, 227, 240, 0.9);
    background: rgba(248, 251, 255, 0.92);
    backdrop-filter: blur(16px);
}

.brand {
    color: var(--primary-dark);
    font-size: 1.05rem;
    font-weight: 800;
    letter-spacing: -0.02em;
    text-decoration: none;
}

.header-score {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    color: var(--muted);
    font-size: 0.68rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

.header-score strong {
    color: var(--primary);
    font-size: 1rem;
    letter-spacing: 0;
    text-transform: none;
}

.app-main {
    width: min(1120px, 100%);
    margin: 0 auto;
    padding: 14px max(var(--space), var(--safe-right)) calc(var(--tab-h) + var(--safe-bottom) + 18px) max(var(--space), var(--safe-left));
}

.button,
.secondary-button,
.piece-button,
.quiz-option,
.advisor-panel select,
.advisor-panel textarea {
    scroll-margin-bottom: calc(var(--tab-h) + var(--safe-bottom) + 16px);
}

.panel {
    display: none;
}

.panel.is-active {
    display: block;
}

.lead {
    margin: 0 0 14px;
    color: var(--muted);
    font-size: 0.95rem;
}

.eyebrow {
    margin: 0 0 6px;
    color: var(--muted);
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.card {
    border: 1px solid var(--border);
    border-radius: var(--radius);
    background: rgba(255, 255, 255, 0.94);
    box-shadow: var(--shadow);
}

.learn-board-wrap,
.lesson-card,
.quiz-card,
.advisor-panel {
    padding: 14px;
}

.status-pill {
    display: block;
    margin-bottom: 12px;
    border-radius: 12px;
    background: var(--surface-strong);
    color: var(--primary-dark);
    font-size: 0.88rem;
    font-weight: 700;
    padding: 10px 12px;
}

.chess-board,
.advisor-board {
    width: 100%;
    max-width: min(100%, calc(100dvh - 15rem));
    margin: 0 auto;
    display: grid;
    overflow: hidden;
    border: 2px solid var(--text);
    border-radius: 14px;
    background: var(--text);
}

.chess-board {
    grid-template-columns: repeat(8, minmax(0, 1fr));
}

.advisor-board {
    grid-template-columns: repeat(8, minmax(0, 1fr));
    max-width: min(100%, calc(100dvh - 22rem));
    margin-top: 12px;
}

.chess-square,
.advisor-square {
    position: relative;
    display: grid;
    aspect-ratio: 1;
    min-width: 0;
    min-height: 0;
    place-items: center;
    border: 0;
    padding: 0;
    color: var(--text);
    font-weight: 800;
}

.chess-square,
.advisor-square {
    cursor: pointer;
    touch-action: none;
    user-select: none;
}

.advisor-piece {
    pointer-events: none;
    line-height: 1;
}

.advisor-square.is-dragging .advisor-piece {
    opacity: 0.28;
}

.advisor-square.is-selected {
    outline: 3px solid var(--primary);
    outline-offset: -3px;
}

.advisor-fen {
    margin-top: 14px;
}

.advisor-fen summary {
    cursor: pointer;
    color: var(--muted);
    font-size: 0.88rem;
    font-weight: 800;
}

.advisor-fen .quiz-copy,
.advisor-fen label {
    margin-top: 10px;
}

.chess-piece {
    pointer-events: none;
}

.chess-square.is-dragging .chess-piece {
    opacity: 0.28;
}

.chess-square.is-drop,
.advisor-square.is-drop {
    outline: 3px solid var(--success);
    outline-offset: -3px;
}

.piece-ghost {
    position: fixed;
    z-index: 80;
    display: grid;
    width: 52px;
    height: 52px;
    place-items: center;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.96);
    box-shadow: 0 12px 28px rgba(31, 41, 55, 0.28);
    font-size: 1.8rem;
    line-height: 1;
    pointer-events: none;
    transform: translate(-50%, -50%);
}

.chess-square.light,
.advisor-square.light {
    background: #f0d9b5;
}

.chess-square.dark,
.advisor-square.dark {
    background: #b58863;
}

.chess-square.is-selected,
.advisor-square.is-from {
    outline: 3px solid var(--primary);
    outline-offset: -3px;
}

.advisor-square.is-to {
    outline: 3px solid var(--success);
    outline-offset: -3px;
}

.chess-square.is-move::after {
    width: 30%;
    height: 30%;
    border-radius: 999px;
    background: rgba(20, 184, 166, 0.72);
    content: "";
}

.chess-piece {
    display: grid;
    width: 82%;
    height: 82%;
    place-items: center;
    border-radius: 999px;
    background: rgba(255, 255, 255, 0.82);
    box-shadow: 0 4px 10px rgba(31, 41, 55, 0.16);
    font-size: clamp(1.05rem, 6.2vw, 1.85rem);
    line-height: 1;
}

.advisor-square {
    font-size: clamp(0.85rem, 4.8vw, 1.45rem);
}

.learn-actions,
.quiz-actions,
.advisor-actions {
    display: grid;
    gap: 8px;
    margin-top: 12px;
}

.advisor-actions {
    grid-template-columns: 1fr 1fr;
}

.button,
.secondary-button,
.piece-button,
.quiz-option {
    display: inline-flex;
    min-height: var(--tap);
    align-items: center;
    justify-content: center;
    border: 0;
    cursor: pointer;
    font-weight: 800;
}

.button,
.secondary-button {
    width: 100%;
    border-radius: 999px;
    padding: 12px 16px;
}

.button {
    background: var(--primary);
    color: #ffffff;
    box-shadow: 0 8px 18px rgba(79, 70, 229, 0.28);
}

.button:active,
.secondary-button:active,
.piece-button:active,
.quiz-option:active {
    transform: scale(0.98);
}

.secondary-button {
    background: var(--surface-strong);
    color: var(--primary-dark);
}

.learn-actions {
    grid-template-columns: 1fr 1fr;
}

.piece-scroller {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 8px;
    margin: 12px 0 0;
    padding: 0;
}

.piece-scroller::-webkit-scrollbar {
    display: none;
}

.piece-button,
.quiz-option {
    border: 1px solid var(--border);
    background: var(--surface-strong);
    color: var(--primary-dark);
}

.piece-button {
    width: 100%;
    justify-content: flex-start;
    border-radius: 14px;
    padding: 10px 14px;
}

.piece-button.is-active,
.quiz-option:hover,
.quiz-option:focus-visible {
    border-color: var(--primary);
    background: #e0e7ff;
}

.lesson-card {
    margin-top: 12px;
}

.lesson-card h2,
.quiz-card h3,
.advisor-panel h2,
.advisor-panel h3 {
    margin: 0 0 8px;
    font-size: 1.15rem;
}

.lesson-card p,
.quiz-copy,
.advisor-panel p {
    margin: 0;
    color: var(--muted);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 8px;
    margin-bottom: 12px;
}

.stat-card {
    border: 1px solid var(--border);
    border-radius: 14px;
    background: var(--surface);
    padding: 12px;
}

.stat-label {
    display: block;
    color: var(--muted);
    font-size: 0.7rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

.stat-value {
    display: block;
    font-size: 1.45rem;
    font-weight: 900;
}

.quiz-options {
    display: grid;
    gap: 8px;
    margin-top: 12px;
}

.quiz-option {
    width: 100%;
    border-radius: 14px;
    padding: 12px 14px;
    text-align: left;
}

.feedback {
    min-height: 24px;
    margin: 10px 0 0;
    color: var(--muted);
    font-weight: 800;
}

.feedback.success {
    color: var(--success);
}

.feedback.danger {
    color: var(--danger);
}

.advisor-grid {
    display: grid;
    gap: 12px;
}

.advisor-board-card {
    order: 1;
}

.advisor-result {
    order: 2;
}

.advisor-square.is-white {
    color: #f8fafc;
    text-shadow:
        0 0 1px #111,
        0 1px 1px #111,
        1px 0 1px #111,
        -1px 0 1px #111;
}

.advisor-square.is-black {
    color: #111827;
}

.advisor-panel label {
    display: grid;
    gap: 8px;
    color: var(--muted);
    font-size: 0.92rem;
    font-weight: 800;
    margin-top: 12px;
}

.advisor-controls > label:first-child {
    margin-top: 0;
}

.advisor-panel textarea,
.advisor-panel select {
    width: 100%;
    min-height: var(--tap);
    border: 1px solid var(--border);
    border-radius: 14px;
    background: var(--surface);
    color: var(--text);
    font-size: 16px;
    padding: 12px 14px;
}

.advisor-panel textarea {
    min-height: 88px;
    font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
    font-size: 14px;
    line-height: 1.4;
    resize: vertical;
}

.move-result {
    border-radius: 14px;
    background: var(--surface-strong);
    color: var(--primary-dark);
    font-weight: 800;
    padding: 14px;
    scroll-margin-bottom: calc(var(--tab-h) + var(--safe-bottom) + 16px);
}

.install-hint {
    margin: 14px 0 0;
    color: var(--muted);
    font-size: 0.8rem;
    text-align: center;
}

.tab-bar {
    position: fixed;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 40;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 4px;
    padding: 6px max(8px, var(--safe-right)) calc(6px + var(--safe-bottom)) max(8px, var(--safe-left));
    border-top: 1px solid var(--border);
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(16px);
}

.tab-button {
    display: flex;
    min-height: 52px;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 2px;
    border: 0;
    border-radius: 12px;
    background: transparent;
    color: var(--muted);
    cursor: pointer;
    font-size: 0.72rem;
    font-weight: 800;
}

.tab-button svg {
    width: 22px;
    height: 22px;
}

.tab-button.is-active {
    background: var(--surface-strong);
    color: var(--primary-dark);
}

.toast {
    position: fixed;
    right: max(16px, var(--safe-right));
    bottom: calc(var(--tab-h) + var(--safe-bottom) + 12px);
    left: max(16px, var(--safe-left));
    z-index: 50;
    border-radius: 14px;
    background: var(--text);
    color: #ffffff;
    font-weight: 700;
    padding: 12px 16px;
    box-shadow: var(--shadow);
    text-align: center;
}

@media (min-width: 640px) {
    .stats-grid {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
}

@media (min-width: 900px) {
    :root {
        --radius: 22px;
        --space: 24px;
    }

    .app-header {
        padding-left: max(32px, var(--safe-left));
        padding-right: max(32px, var(--safe-right));
    }

    .brand {
        font-size: 1.2rem;
    }

    .app-main {
        padding: 24px max(32px, var(--safe-right)) 48px max(32px, var(--safe-left));
    }

    .tab-bar {
        position: sticky;
        top: calc(var(--header-h) + var(--safe-top));
        bottom: auto;
        width: min(1120px, calc(100% - 64px));
        margin: 12px auto 0;
        border: 1px solid var(--border);
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.94);
        box-shadow: var(--shadow);
    }

    .tab-button {
        flex-direction: row;
        gap: 8px;
        font-size: 0.9rem;
    }

    .learn-layout,
    .advisor-grid {
        display: grid;
        gap: 20px;
        align-items: start;
    }

    .learn-layout {
        grid-template-columns: minmax(280px, 1fr) minmax(280px, 380px);
    }

    .advisor-grid {
        grid-template-columns: minmax(280px, 1fr) minmax(260px, 360px);
        grid-template-areas: "board result";
    }

    .advisor-board-card { grid-area: board; order: 0; }
    .advisor-result { grid-area: result; order: 0; }

    .lesson-card {
        margin-top: 0;
    }

    .piece-scroller {
        display: flex;
        flex-wrap: wrap;
        overflow: visible;
        margin: 14px 0 0;
        padding: 0;
    }

    .piece-button {
        width: auto;
        justify-content: center;
        border-radius: 999px;
    }

    .chess-board,
    .advisor-board {
        max-width: 520px;
        margin-left: 0;
    }

    .chess-piece {
        font-size: clamp(1.2rem, 2.4vw, 2rem);
    }

    .toast {
        right: 24px;
        bottom: 24px;
        left: auto;
        max-width: 320px;
        text-align: left;
    }
}
    </style>
</head>
<body>
    <header class="app-header">
        <a class="brand" href="index.php">Chess App</a>
        <div class="header-score">
            Best
            <strong data-best-score="chess">-</strong>
        </div>
    </header>

    <nav class="tab-bar" role="tablist" aria-label="App sections">
        <button class="tab-button is-active" type="button" role="tab" id="tab-learn" data-tab="learn" aria-controls="panel-learn" aria-selected="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                <path d="M3 12h18M12 3v18"></path>
            </svg>
            Learn
        </button>
        <button class="tab-button" type="button" role="tab" id="tab-quiz" data-tab="quiz" aria-controls="panel-quiz" aria-selected="false">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M9.5 9a2.5 2.5 0 1 1 3.4 2.3c-.8.4-1.4 1-1.4 1.9V14"></path>
                <path d="M12 17h.01"></path>
            </svg>
            Quiz
        </button>
        <button class="tab-button" type="button" role="tab" id="tab-advisor" data-tab="advisor" aria-controls="panel-advisor" aria-selected="false">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path d="M12 3v3"></path>
                <path d="M12 18v3"></path>
                <path d="M5 8l2 2"></path>
                <path d="M17 14l2 2"></path>
                <circle cx="12" cy="12" r="4"></circle>
            </svg>
            Advisor
        </button>
    </nav>

    <main class="app-main">
        <section class="panel is-active" id="panel-learn" data-panel="learn" role="tabpanel" aria-labelledby="tab-learn">
            <p class="lead">Drag a piece to a highlighted square, or tap the square.</p>
            <div class="learn-layout">
                <div class="card learn-board-wrap">
                    <span class="status-pill" data-status>Select a piece on the board.</span>
                    <div class="chess-board" data-board aria-label="Chess practice board"></div>
                    <div class="piece-scroller" data-piece-list></div>
                    <div class="learn-actions">
                        <button class="secondary-button" type="button" data-show-all>Show all moves</button>
                        <button class="secondary-button" type="button" data-reset-board>Reset board</button>
                    </div>
                </div>

                <aside class="card lesson-card">
                    <p class="eyebrow">Piece lesson</p>
                    <h2 data-piece-title>Learn the pieces</h2>
                    <p data-piece-description>
                        Drag a piece onto a highlighted square to practice the move.
                        You can also tap the destination square.
                    </p>
                    <p class="install-hint">On your phone: browser menu → Add to Home Screen</p>
                </aside>
            </div>
        </section>

        <section class="panel" id="panel-quiz" data-panel="quiz" role="tabpanel" aria-labelledby="tab-quiz" hidden>
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
                    <span class="stat-label">Saved</span>
                    <span class="stat-value" data-total-sessions>0</span>
                </div>
            </div>

            <div class="card quiz-card">
                <div class="quiz-actions">
                    <button class="button" type="button" data-new-quiz>New quiz</button>
                </div>
                <p class="eyebrow">Practice question</p>
                <h3 data-question>Press New quiz to begin.</h3>
                <div class="quiz-options" data-options></div>
                <p class="feedback" data-feedback></p>
            </div>
        </section>

        <section class="panel" id="panel-advisor" data-panel="advisor" role="tabpanel" aria-labelledby="tab-advisor" hidden>
            <p class="lead">Move the pieces to match your game, then tap Analyze. You do not need a position code.</p>
            <div class="advisor-grid">
                <div class="card advisor-panel advisor-board-card">
                    <h2>Your board</h2>
                    <p class="quiz-copy">Drag a piece to a new square, or tap a piece and then tap where it should go.</p>
                    <div class="advisor-board" data-advisor-board aria-label="Chess position board"></div>
                    <label for="side-input">
                        Whose turn is it?
                        <select id="side-input" data-side-input>
                            <option value="w">White to move</option>
                            <option value="b">Black to move</option>
                        </select>
                    </label>
                    <div class="advisor-actions">
                        <button class="button" type="button" data-analyze-position>Analyze</button>
                        <button class="secondary-button" type="button" data-reset-position>Reset</button>
                    </div>
                    <p class="feedback" data-advisor-feedback></p>
                    <details class="advisor-fen">
                        <summary>Advanced: position code (FEN)</summary>
                        <p class="quiz-copy">
                            FEN is a text snapshot of a chessboard. Skip this unless you copied a code from another chess site.
                        </p>
                        <label for="fen-input">
                            FEN
                            <textarea id="fen-input" data-fen-input spellcheck="false" autocorrect="off" autocapitalize="off">rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1</textarea>
                        </label>
                    </details>
                </div>

                <aside class="card advisor-panel advisor-result">
                    <h3>Suggested move</h3>
                    <div class="move-result" data-move-result>
                        Set up the board, then analyze it to get a suggested move.
                    </div>
                    <p class="quiz-copy" data-move-explanation style="margin-top: 12px;">
                        White pieces start on the bottom. Black pieces start on the top.
                    </p>
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
            symbol: '♔',
            start: 'e4',
            description: 'The king moves one square in any direction. Protecting it is the main goal of chess.',
        },
        queen: {
            label: 'Queen',
            mark: 'Q',
            symbol: '♕',
            start: 'd4',
            description: 'The queen moves any number of squares in a straight line: forward, backward, sideways, or diagonal.',
        },
        rook: {
            label: 'Rook',
            mark: 'R',
            symbol: '♖',
            start: 'a1',
            description: 'The rook moves any number of squares horizontally or vertically.',
        },
        bishop: {
            label: 'Bishop',
            mark: 'B',
            symbol: '♗',
            start: 'c1',
            description: 'The bishop moves any number of squares diagonally.',
        },
        knight: {
            label: 'Knight',
            mark: 'N',
            symbol: '♘',
            start: 'g1',
            description: 'The knight moves in an L shape: two squares one way, then one square sideways. It can jump over pieces.',
        },
        pawn: {
            label: 'Pawn',
            mark: 'P',
            symbol: '♙',
            start: 'e2',
            description: 'A pawn moves forward one square, can move two squares from its starting square, and captures diagonally.',
        },
    };

    Object.values(pieces).forEach((piece) => {
        piece.home = piece.start;
    });

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
    const resetBoardButton = document.querySelector('[data-reset-board]');
    const newQuizButton = document.querySelector('[data-new-quiz]');
    const questionElement = document.querySelector('[data-question]');
    const optionsElement = document.querySelector('[data-options]');
    const feedback = document.querySelector('[data-feedback]');
    const questionCount = document.querySelector('[data-question-count]');
    const correctElement = document.querySelector('[data-correct]');
    const scoreElement = document.querySelector('[data-score]');
    const fenInput = document.querySelector('[data-fen-input]');
    const sideInput = document.querySelector('[data-side-input]');
    const analyzeButton = document.querySelector('[data-analyze-position]');
    const resetPositionButton = document.querySelector('[data-reset-position]');
    const advisorBoard = document.querySelector('[data-advisor-board]');
    const advisorFeedback = document.querySelector('[data-advisor-feedback]');
    const moveResult = document.querySelector('[data-move-result]');
    const moveExplanation = document.querySelector('[data-move-explanation]');

    let selectedPiece = 'king';
    let highlightedSquares = [];
    let quiz = [];
    let currentQuestion = 0;
    let correct = 0;
    let score = 0;
    let answered = false;
    let highlightedAdvisorMove = null;
    let drag = null;
    let skipBoardClick = false;
    let advisorPosition = null;
    let advisorSelectedSquare = null;
    let advisorDrag = null;
    let skipAdvisorClick = false;
    const START_FEN = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
    const advisorPieceValues = {
        p: 100,
        n: 320,
        b: 330,
        r: 500,
        q: 900,
        k: 0,
    };
    const advisorPieceLabels = {
        p: 'pawn',
        n: 'knight',
        b: 'bishop',
        r: 'rook',
        q: 'queen',
        k: 'king',
    };
    const advisorMarks = {
        p: 'P',
        n: 'N',
        b: 'B',
        r: 'R',
        q: 'Q',
        k: 'K',
    };
    const advisorSymbols = {
        P: '♙',
        N: '♘',
        B: '♗',
        R: '♖',
        Q: '♕',
        K: '♔',
        p: '♟',
        n: '♞',
        b: '♝',
        r: '♜',
        q: '♛',
        k: '♚',
    };

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
            const moves = [coordsToSquare(origin.file, origin.rank + 1)];
            if (origin.rank === 2) {
                moves.push(coordsToSquare(origin.file, origin.rank + 2));
            }
            moves.push(
                coordsToSquare(origin.file - 1, origin.rank + 1),
                coordsToSquare(origin.file + 1, origin.rank + 1)
            );
            return moves.filter(Boolean);
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
                square.draggable = false;
                square.setAttribute('aria-label', squareName);

                const pieceEntry = pieceAt(squareName);
                if (pieceEntry) {
                    const [pieceKey, piece] = pieceEntry;
                    const pieceElement = document.createElement('span');
                    pieceElement.className = 'chess-piece';
                    pieceElement.textContent = piece.symbol;
                    pieceElement.title = piece.label;
                    pieceElement.draggable = false;
                    square.appendChild(pieceElement);
                    square.dataset.piece = pieceKey;
                }

                if (pieceEntry && pieceEntry[0] === selectedPiece) {
                    square.classList.add('is-selected');
                }

                if (highlightedSquares.includes(squareName)) {
                    square.classList.add('is-move');
                }

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
            button.textContent = `${piece.symbol} ${piece.label}`;
            button.addEventListener('click', () => selectPiece(pieceKey));
            pieceList.appendChild(button);
        });
    }

    function applySelection(pieceKey) {
        selectedPiece = pieceKey;
        const piece = pieces[pieceKey];
        highlightedSquares = movesFor(pieceKey);
        title.textContent = `${piece.label} (${piece.mark})`;
        description.textContent = piece.description;
        statusElement.textContent = `${piece.label} selected. Drag it to a highlighted square, or tap the square.`;
        renderPieceButtons();
    }

    function refreshBoardHighlights() {
        board.querySelectorAll('[data-square]').forEach((square) => {
            square.classList.toggle('is-selected', square.dataset.piece === selectedPiece);
            square.classList.toggle('is-move', highlightedSquares.includes(square.dataset.square));
        });
    }

    function canDropOn(squareName) {
        return Boolean(squareName) && highlightedSquares.includes(squareName) && !pieceAt(squareName);
    }

    function selectPiece(pieceKey) {
        applySelection(pieceKey);
        renderBoard();
    }

    function movePiece(pieceKey, squareName) {
        if (!canDropOn(squareName)) {
            return;
        }

        pieces[pieceKey].start = squareName;
        applySelection(pieceKey);
        statusElement.textContent = `${pieces[pieceKey].label} moved to ${squareName}.`;
        renderBoard();
    }

    function resetBoard() {
        Object.values(pieces).forEach((piece) => {
            piece.start = piece.home;
        });
        highlightedSquares = [];
        selectPiece(selectedPiece || 'king');
        statusElement.textContent = 'Board reset. Drag a piece to a highlighted square.';
    }

    function squareFromPoint(x, y) {
        const element = document.elementFromPoint(x, y);
        return element ? element.closest('.chess-board [data-square]') : null;
    }

    function clearDropTarget() {
        board.querySelectorAll('.is-drop').forEach((square) => square.classList.remove('is-drop'));
    }

    function updateDropTarget(x, y) {
        clearDropTarget();
        const square = squareFromPoint(x, y);
        if (square && canDropOn(square.dataset.square)) {
            square.classList.add('is-drop');
        }
    }

    function endDrag(event) {
        if (!drag || event.pointerId !== drag.pointerId) {
            return;
        }

        const dropped = drag.moved;
        const destination = dropped ? squareFromPoint(event.clientX, event.clientY) : null;
        const pieceKey = drag.pieceKey;

        if (drag.ghost) {
            drag.ghost.remove();
        }

        if (drag.originSquare) {
            drag.originSquare.classList.remove('is-dragging');
        }

        clearDropTarget();
        drag = null;

        if (dropped) {
            skipBoardClick = true;
            const squareName = destination && destination.dataset.square;
            if (canDropOn(squareName)) {
                movePiece(pieceKey, squareName);
            }
        }
    }

    board.addEventListener('pointerdown', (event) => {
        const square = event.target.closest('[data-square]');
        if (!square || !board.contains(square) || !square.dataset.piece) {
            return;
        }

        event.preventDefault();
        applySelection(square.dataset.piece);
        refreshBoardHighlights();

        drag = {
            pieceKey: square.dataset.piece,
            pointerId: event.pointerId,
            startX: event.clientX,
            startY: event.clientY,
            moved: false,
            ghost: null,
            originSquare: square,
        };

        try {
            square.setPointerCapture(event.pointerId);
        } catch (error) {
            // Some browsers only allow capture from a trusted pointer gesture.
        }
    });

    board.addEventListener('pointermove', (event) => {
        if (!drag || event.pointerId !== drag.pointerId) {
            return;
        }

        const distanceX = event.clientX - drag.startX;
        const distanceY = event.clientY - drag.startY;
        if (!drag.moved && ((distanceX * distanceX) + (distanceY * distanceY)) < 36) {
            return;
        }

        if (!drag.moved) {
            drag.moved = true;
            drag.ghost = document.createElement('div');
            drag.ghost.className = 'piece-ghost';
            drag.ghost.textContent = pieces[drag.pieceKey].symbol;
            document.body.appendChild(drag.ghost);
            drag.originSquare.classList.add('is-dragging');
        }

        drag.ghost.style.left = `${event.clientX}px`;
        drag.ghost.style.top = `${event.clientY}px`;
        updateDropTarget(event.clientX, event.clientY);
    });

    board.addEventListener('pointerup', endDrag);
    board.addEventListener('pointercancel', endDrag);
    board.addEventListener('dragstart', (event) => event.preventDefault());

    board.addEventListener('click', (event) => {
        if (skipBoardClick) {
            skipBoardClick = false;
            return;
        }

        const square = event.target.closest('[data-square]');
        if (!square || !board.contains(square)) {
            return;
        }

        if (square.dataset.piece) {
            selectPiece(square.dataset.piece);
            return;
        }

        if (selectedPiece && canDropOn(square.dataset.square)) {
            movePiece(selectedPiece, square.dataset.square);
        }
    });

    function shuffle(items) {
        return [...items].sort(() => Math.random() - 0.5);
    }

    function parseFen(fen) {
        const parts = fen.trim().split(/\s+/);
        const boardPart = parts[0];
        const rows = boardPart ? boardPart.split('/') : [];

        if (rows.length !== 8) {
            throw new Error('FEN must have 8 board rows.');
        }

        const boardState = {};
        rows.forEach((row, rowIndex) => {
            let fileIndex = 0;
            row.split('').forEach((char) => {
                if (/\d/.test(char)) {
                    fileIndex += Number(char);
                    return;
                }

                if (!/[prnbqkPRNBQK]/.test(char)) {
                    throw new Error(`Invalid piece "${char}" in FEN.`);
                }

                if (fileIndex > 7) {
                    throw new Error('A FEN row contains too many squares.');
                }

                const square = `${files[fileIndex]}${8 - rowIndex}`;
                boardState[square] = char;
                fileIndex += 1;
            });

            if (fileIndex !== 8) {
                throw new Error('Each FEN row must describe exactly 8 squares.');
            }
        });

        return {
            board: boardState,
            side: parts[1] === 'b' ? 'b' : 'w',
        };
    }

    function pieceColor(piece) {
        return piece === piece.toUpperCase() ? 'w' : 'b';
    }

    function pieceKind(piece) {
        return piece.toLowerCase();
    }

    function isOwnPiece(piece, side) {
        return piece && pieceColor(piece) === side;
    }

    function isEnemyPiece(piece, side) {
        return piece && pieceColor(piece) !== side;
    }

    function renderAdvisorBoard(position, move) {
        advisorBoard.innerHTML = '';
        ranks.forEach((rank) => {
            files.forEach((file, fileIndex) => {
                const squareName = `${file}${rank}`;
                const square = document.createElement('button');
                const color = (fileIndex + rank) % 2 === 0 ? 'dark' : 'light';
                const piece = position.board[squareName];
                square.type = 'button';
                square.className = `advisor-square ${color}`;
                square.dataset.square = squareName;
                square.draggable = false;
                square.setAttribute('aria-label', squareName);

                if (piece) {
                    const pieceElement = document.createElement('span');
                    pieceElement.className = 'advisor-piece';
                    pieceElement.textContent = advisorSymbols[piece];
                    pieceElement.draggable = false;
                    square.appendChild(pieceElement);
                    square.dataset.piece = piece;
                    square.classList.add(pieceColor(piece) === 'w' ? 'is-white' : 'is-black');
                }

                if (advisorSelectedSquare === squareName) {
                    square.classList.add('is-selected');
                }

                if (move && squareName === move.from) {
                    square.classList.add('is-from');
                }

                if (move && squareName === move.to) {
                    square.classList.add('is-to');
                }

                advisorBoard.appendChild(square);
            });
        });
    }

    function positionToFen(position) {
        const rows = ranks.map((rank) => {
            let row = '';
            let empty = 0;

            files.forEach((file) => {
                const piece = position.board[`${file}${rank}`];
                if (!piece) {
                    empty += 1;
                    return;
                }

                if (empty) {
                    row += String(empty);
                    empty = 0;
                }

                row += piece;
            });

            if (empty) {
                row += String(empty);
            }

            return row;
        });

        const boardPart = rows.join('/');
        const castle = boardPart === 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR' ? 'KQkq' : '-';
        return `${boardPart} ${position.side || 'w'} ${castle} - 0 1`;
    }

    function syncFenFromPosition() {
        if (!advisorPosition) {
            return;
        }

        advisorPosition.side = sideInput.value || 'w';
        fenInput.value = positionToFen(advisorPosition);
    }

    function refreshAdvisorSelection() {
        advisorBoard.querySelectorAll('[data-square]').forEach((square) => {
            square.classList.toggle('is-selected', square.dataset.square === advisorSelectedSquare);
        });
    }

    function moveAdvisorPiece(from, to) {
        if (!advisorPosition || !from || !to || from === to) {
            return;
        }

        const piece = advisorPosition.board[from];
        if (!piece) {
            return;
        }

        delete advisorPosition.board[from];
        advisorPosition.board[to] = piece;
        advisorSelectedSquare = to;
        highlightedAdvisorMove = null;
        syncFenFromPosition();
        renderAdvisorBoard(advisorPosition, null);
        advisorFeedback.className = 'feedback';
        advisorFeedback.textContent = `Moved to ${to}. Tap Analyze when the board matches your game.`;
        moveResult.textContent = 'Set up the board, then analyze it to get a suggested move.';
        moveExplanation.textContent = 'White pieces start on the bottom. Black pieces start on the top.';
    }

    function advisorSquareFromPoint(x, y) {
        const element = document.elementFromPoint(x, y);
        return element ? element.closest('.advisor-board [data-square]') : null;
    }

    function clearAdvisorDropTarget() {
        advisorBoard.querySelectorAll('.is-drop').forEach((square) => square.classList.remove('is-drop'));
    }

    function endAdvisorDrag(event) {
        if (!advisorDrag || event.pointerId !== advisorDrag.pointerId) {
            return;
        }

        const dropped = advisorDrag.moved;
        const destination = dropped ? advisorSquareFromPoint(event.clientX, event.clientY) : null;
        const from = advisorDrag.from;

        if (advisorDrag.ghost) {
            advisorDrag.ghost.remove();
        }

        if (advisorDrag.originSquare) {
            advisorDrag.originSquare.classList.remove('is-dragging');
        }

        clearAdvisorDropTarget();
        advisorDrag = null;

        if (dropped) {
            skipAdvisorClick = true;
            const to = destination && destination.dataset.square;
            if (to && to !== from) {
                moveAdvisorPiece(from, to);
            }
        }
    }

    advisorBoard.addEventListener('pointerdown', (event) => {
        const square = event.target.closest('[data-square]');
        if (!square || !advisorBoard.contains(square) || !square.dataset.piece) {
            return;
        }

        event.preventDefault();
        advisorSelectedSquare = square.dataset.square;
        refreshAdvisorSelection();

        advisorDrag = {
            from: square.dataset.square,
            pointerId: event.pointerId,
            startX: event.clientX,
            startY: event.clientY,
            moved: false,
            ghost: null,
            originSquare: square,
            symbol: square.querySelector('.advisor-piece').textContent,
        };

        try {
            square.setPointerCapture(event.pointerId);
        } catch (error) {
            // Some browsers only allow capture from a trusted pointer gesture.
        }
    });

    advisorBoard.addEventListener('pointermove', (event) => {
        if (!advisorDrag || event.pointerId !== advisorDrag.pointerId) {
            return;
        }

        const distanceX = event.clientX - advisorDrag.startX;
        const distanceY = event.clientY - advisorDrag.startY;
        if (!advisorDrag.moved && ((distanceX * distanceX) + (distanceY * distanceY)) < 36) {
            return;
        }

        if (!advisorDrag.moved) {
            advisorDrag.moved = true;
            advisorDrag.ghost = document.createElement('div');
            advisorDrag.ghost.className = 'piece-ghost';
            advisorDrag.ghost.textContent = advisorDrag.symbol;
            document.body.appendChild(advisorDrag.ghost);
            advisorDrag.originSquare.classList.add('is-dragging');
        }

        advisorDrag.ghost.style.left = `${event.clientX}px`;
        advisorDrag.ghost.style.top = `${event.clientY}px`;
        clearAdvisorDropTarget();
        const hoverSquare = advisorSquareFromPoint(event.clientX, event.clientY);
        if (hoverSquare && hoverSquare.dataset.square !== advisorDrag.from) {
            hoverSquare.classList.add('is-drop');
        }
    });

    advisorBoard.addEventListener('pointerup', endAdvisorDrag);
    advisorBoard.addEventListener('pointercancel', endAdvisorDrag);
    advisorBoard.addEventListener('dragstart', (event) => event.preventDefault());

    advisorBoard.addEventListener('click', (event) => {
        if (skipAdvisorClick) {
            skipAdvisorClick = false;
            return;
        }

        const square = event.target.closest('[data-square]');
        if (!square || !advisorBoard.contains(square)) {
            return;
        }

        const squareName = square.dataset.square;
        if (square.dataset.piece) {
            advisorSelectedSquare = advisorSelectedSquare === squareName ? null : squareName;
            refreshAdvisorSelection();
            return;
        }

        if (advisorSelectedSquare) {
            moveAdvisorPiece(advisorSelectedSquare, squareName);
        }
    });

    function addRayAdvisorMoves(position, from, side, directions, moves) {
        const origin = squareToCoords(from);
        directions.forEach(([fileStep, rankStep]) => {
            for (let distance = 1; distance <= 7; distance += 1) {
                const target = coordsToSquare(origin.file + (fileStep * distance), origin.rank + (rankStep * distance));
                if (!target) {
                    break;
                }

                const targetPiece = position.board[target];
                if (isOwnPiece(targetPiece, side)) {
                    break;
                }

                moves.push(createAdvisorMove(position, from, target, side));

                if (isEnemyPiece(targetPiece, side)) {
                    break;
                }
            }
        });
    }

    function createAdvisorMove(position, from, to, side) {
        const piece = position.board[from];
        const captured = position.board[to] || null;
        return {
            from,
            to,
            side,
            piece,
            captured,
            label: `${advisorMarks[pieceKind(piece)]}${from}-${to}`,
        };
    }

    function advisorMovesForPiece(position, from, side) {
        const piece = position.board[from];
        const kind = pieceKind(piece);
        const origin = squareToCoords(from);
        const moves = [];
        const forward = side === 'w' ? 1 : -1;
        const startRank = side === 'w' ? 2 : 7;

        if (kind === 'p') {
            const oneStep = coordsToSquare(origin.file, origin.rank + forward);
            const twoStep = coordsToSquare(origin.file, origin.rank + (forward * 2));
            if (oneStep && !position.board[oneStep]) {
                moves.push(createAdvisorMove(position, from, oneStep, side));
                if (origin.rank === startRank && twoStep && !position.board[twoStep]) {
                    moves.push(createAdvisorMove(position, from, twoStep, side));
                }
            }

            [-1, 1].forEach((fileStep) => {
                const target = coordsToSquare(origin.file + fileStep, origin.rank + forward);
                if (target && isEnemyPiece(position.board[target], side)) {
                    moves.push(createAdvisorMove(position, from, target, side));
                }
            });
        }

        if (kind === 'n') {
            [
                [1, 2], [2, 1], [2, -1], [1, -2],
                [-1, -2], [-2, -1], [-2, 1], [-1, 2],
            ].forEach(([fileStep, rankStep]) => {
                const target = coordsToSquare(origin.file + fileStep, origin.rank + rankStep);
                if (target && !isOwnPiece(position.board[target], side)) {
                    moves.push(createAdvisorMove(position, from, target, side));
                }
            });
        }

        if (kind === 'b' || kind === 'q') {
            addRayAdvisorMoves(position, from, side, [[1, 1], [1, -1], [-1, 1], [-1, -1]], moves);
        }

        if (kind === 'r' || kind === 'q') {
            addRayAdvisorMoves(position, from, side, [[1, 0], [-1, 0], [0, 1], [0, -1]], moves);
        }

        if (kind === 'k') {
            [
                [1, 0], [-1, 0], [0, 1], [0, -1],
                [1, 1], [1, -1], [-1, 1], [-1, -1],
            ].forEach(([fileStep, rankStep]) => {
                const target = coordsToSquare(origin.file + fileStep, origin.rank + rankStep);
                if (target && !isOwnPiece(position.board[target], side)) {
                    moves.push(createAdvisorMove(position, from, target, side));
                }
            });
        }

        return moves;
    }

    function generateAdvisorMoves(position, side) {
        return Object.keys(position.board).flatMap((square) => {
            const piece = position.board[square];
            if (!isOwnPiece(piece, side)) {
                return [];
            }

            return advisorMovesForPiece(position, square, side);
        });
    }

    function centerBonus(square) {
        if (['d4', 'e4', 'd5', 'e5'].includes(square)) {
            return 35;
        }

        if (['c3', 'd3', 'e3', 'f3', 'c4', 'f4', 'c5', 'f5', 'c6', 'd6', 'e6', 'f6'].includes(square)) {
            return 15;
        }

        return 0;
    }

    function developmentBonus(move) {
        const kind = pieceKind(move.piece);
        if ((kind === 'n' || kind === 'b') && ['b1', 'c1', 'f1', 'g1', 'b8', 'c8', 'f8', 'g8'].includes(move.from)) {
            return 28;
        }

        if (kind === 'p' && ['d4', 'e4', 'd5', 'e5'].includes(move.to)) {
            return 20;
        }

        return 0;
    }

    function scoreAdvisorMove(move) {
        const captureScore = move.captured ? advisorPieceValues[pieceKind(move.captured)] + 40 : 0;
        return captureScore + centerBonus(move.to) + developmentBonus(move);
    }

    function explainAdvisorMove(move) {
        const reasons = [];
        const pieceName = advisorPieceLabels[pieceKind(move.piece)];

        if (move.captured) {
            reasons.push(`it wins the opponent's ${advisorPieceLabels[pieceKind(move.captured)]}`);
        }

        if (centerBonus(move.to) > 0) {
            reasons.push('it improves control of the center');
        }

        if (developmentBonus(move) > 0) {
            reasons.push('it develops a piece or claims useful space');
        }

        if (!reasons.length) {
            reasons.push('it improves your position without giving material away in this simple check');
        }

        return `Move the ${pieceName} from ${move.from} to ${move.to}: ${reasons.join(', ')}.`;
    }

    function analyzeManualPosition() {
        try {
            if (!advisorPosition) {
                advisorPosition = parseFen(fenInput.value || START_FEN);
            }

            const position = {
                board: { ...advisorPosition.board },
                side: sideInput.value || advisorPosition.side || 'w',
            };
            advisorPosition.side = position.side;
            syncFenFromPosition();

            const moves = generateAdvisorMoves(position, position.side)
                .map((move) => ({ ...move, score: scoreAdvisorMove(move) }))
                .sort((a, b) => b.score - a.score);

            if (!moves.length) {
                highlightedAdvisorMove = null;
                renderAdvisorBoard(position, null);
                moveResult.textContent = 'No basic legal-looking moves were found.';
                moveExplanation.textContent = 'Check that the selected side has pieces left to move.';
                advisorFeedback.className = 'feedback danger';
                advisorFeedback.textContent = 'No move suggestion available.';
                return;
            }

            const best = moves[0];
            highlightedAdvisorMove = best;
            advisorSelectedSquare = null;
            renderAdvisorBoard(position, best);
            moveResult.textContent = `${position.side === 'w' ? 'White' : 'Black'}: ${best.label}`;
            moveExplanation.textContent = explainAdvisorMove(best);
            advisorFeedback.className = 'feedback success';
            advisorFeedback.textContent = 'Suggested move is highlighted on the board.';
            moveResult.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } catch (error) {
            highlightedAdvisorMove = null;
            advisorFeedback.className = 'feedback danger';
            advisorFeedback.textContent = error.message;
            moveResult.textContent = 'Could not analyze this position.';
            moveExplanation.textContent = 'Reset the board and move the pieces to match your game.';
        }
    }

    function resetManualPosition() {
        fenInput.value = START_FEN;
        sideInput.value = 'w';
        highlightedAdvisorMove = null;
        advisorSelectedSquare = null;
        advisorPosition = parseFen(START_FEN);
        renderAdvisorBoard(advisorPosition, null);
        advisorFeedback.className = 'feedback';
        advisorFeedback.textContent = '';
        moveResult.textContent = 'Set up the board, then analyze it to get a suggested move.';
        moveExplanation.textContent = 'White pieces start on the bottom. Black pieces start on the top.';
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

    function showPanel(panelId) {
        document.querySelectorAll('[data-panel]').forEach((panel) => {
            const isActive = panel.dataset.panel === panelId;
            panel.classList.toggle('is-active', isActive);
            panel.hidden = !isActive;
        });

        document.querySelectorAll('[data-tab]').forEach((tab) => {
            const isActive = tab.dataset.tab === panelId;
            tab.classList.toggle('is-active', isActive);
            tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    document.querySelectorAll('[data-tab]').forEach((tab) => {
        tab.addEventListener('click', () => showPanel(tab.dataset.tab));
    });

    showAllButton.addEventListener('click', showAllMoves);
    resetBoardButton.addEventListener('click', resetBoard);
    newQuizButton.addEventListener('click', startQuiz);
    analyzeButton.addEventListener('click', analyzeManualPosition);
    resetPositionButton.addEventListener('click', resetManualPosition);
    sideInput.addEventListener('change', syncFenFromPosition);
    fenInput.addEventListener('change', () => {
        try {
            const position = parseFen(fenInput.value);
            position.side = position.side || sideInput.value || 'w';
            sideInput.value = position.side;
            advisorSelectedSquare = null;
            highlightedAdvisorMove = null;
            advisorPosition = position;
            renderAdvisorBoard(position, null);
            advisorFeedback.className = 'feedback success';
            advisorFeedback.textContent = 'Position code loaded onto the board.';
        } catch (error) {
            advisorFeedback.className = 'feedback danger';
            advisorFeedback.textContent = error.message;
        }
    });
    document.addEventListener('DOMContentLoaded', () => {
        renderPieceButtons();
        selectPiece('king');
        resetManualPosition();
    });
})();

    </script>
</body>
</html>
