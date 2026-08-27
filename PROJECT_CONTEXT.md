# Chess App Project Context

## Purpose

A standalone beginner chess-learning application for WAMP and shared PHP hosting. It teaches piece movement through an interactive board and quiz. It is a learning tool, not a complete chess engine.

## Current implementation

- PHP entry page with vanilla HTML, CSS, and JavaScript.
- Browser-only score storage using `localStorage`.
- Interactive piece movement and move highlighting.
- Shuffled beginner quiz with score, best score, attempts, and notifications.
- No server-side database is required.

## Locations

- Working local folder: `C:\wamp64\www\chess-app`
- Verified local URL when WAMP/Apache is running: `http://localhost/chess-app/`
- Production folder: `dgkreative.co.za/chess-app`
- Production URL: `https://dgkreative.co.za/chess-app`

## Deployment rules

- WordPress occupies the `dgkreative.co.za` root. Never upload this app over the root.
- In cPanel, enter `dgkreative.co.za/chess-app` first.
- Upload the app files into that folder, with `index.php` directly inside it.
- A historical single-file deployment bundle exists in the GPTEXPORT archive, but the working WAMP folder is the canonical source.
- After deployment, verify the page and direct CSS/JavaScript asset URLs.

## Current limitations and backlog

- No check, checkmate, captures, opponent, or full-game engine.
- Confirm that the live deployment loads all assets correctly.
- Keep one canonical chess-logic implementation to avoid duplication with Memory Trainer.
- Expand the quiz bank if the learning scope grows.
- Consider full-game mode only as a separate planned feature.

## Source

Summarized from the GPTEXPORT project files and the working WAMP README. Last organized: 2026-07-29.
