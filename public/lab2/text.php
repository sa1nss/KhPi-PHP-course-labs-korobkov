<?php
$logFile = 'log.txt';

if (isset($_POST['textdata'])) {
    $text = trim($_POST['textdata']);

    if ($text !== '') {
        file_put_contents($logFile, $text . PHP_EOL, FILE_APPEND);
        echo "<h3>✅ Дані успішно записано у log.txt</h3>";
    } else {
        echo "<h3>⚠️ Текст не може бути порожнім.</h3>";
    }
}

if (file_exists($logFile)) {
    echo "<h3>📄 Вміст log.txt:</h3>";
    echo "<pre>" . htmlspecialchars(file_get_contents($logFile)) . "</pre>";
} else {
    echo "<p>Файл log.txt поки що порожній.</p>";
}

echo "<br><a href='index.html'>⬅️ Назад</a>";
?>
