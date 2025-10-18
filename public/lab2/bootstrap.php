<?php

function render_header($title = 'Лабораторна робота №2') {
    echo '<!doctype html><html lang="uk"><head>';
    echo '<meta charset="utf-8">';
    echo '<meta name="viewport" content="width=device-width,initial-scale=1">';
    echo "<title>" . htmlspecialchars($title) . "</title>";
    echo '<link rel="stylesheet" href="style.css">';
    echo '</head><body>';
    echo '<div class="container">';
    echo '<h1>' . htmlspecialchars($title) . '</h1>';
}

function render_footer() {
    echo '<p class="small">Лаб. робота №2 — Файли та файлова структура</p>';
    echo '</div></body></html>';
}
