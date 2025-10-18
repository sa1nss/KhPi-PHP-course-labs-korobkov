<?php
$uploadDir = 'uploads/';

echo "<h2>📂 Список файлів у директорії uploads:</h2>";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$files = array_diff(scandir($uploadDir), ['.', '..']);

if (count($files) === 0) {
    echo "<p>Папка порожня.</p>";
} else {
    echo "<ul>";
    foreach ($files as $file) {
        $filePath = $uploadDir . $file;
        echo "<li><a href='$filePath' download>$file</a> (" . round(filesize($filePath) / 1024, 2) . " КБ)</li>";
    }
    echo "</ul>";
}

echo "<br><a href='index.html'>⬅️ Повернутись назад</a>";
?>
