<?php
session_start();

if (!isset($_SESSION['session_data'])) {
    sleep(2);
    $_SESSION['session_data'] = [
        'time' => date("H:i:s"),
        'values' => [rand(10, 99), rand(10, 99), rand(10, 99)]
    ];
}

echo "<h1>Кешування у сесії</h1>";
echo "Час створення кешу: " . $_SESSION['session_data']['time'] . "<br>";
echo "Дані: " . implode(", ", $_SESSION['session_data']['values']);
