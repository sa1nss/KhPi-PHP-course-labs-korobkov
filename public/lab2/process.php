<?php
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {

    $fileName = basename($_FILES['userfile']['name']);
    $fileTmp = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg', 'jpeg', 'png'];
    if (!in_array($fileType, $allowedTypes)) {
        die("❌ Дозволено завантаження лише зображень (jpg, jpeg, png).");
    }

    if ($fileSize > 2 * 1024 * 1024) {
        die("❌ Розмір файлу перевищує 2 МБ.");
    }

    $targetFile = $uploadDir . $fileName;
    if (file_exists($targetFile)) {
        $fileName = pathinfo($fileName, PATHINFO_FILENAME) . "_" . date("Ymd_His") . "." . $fileType;
        $targetFile = $uploadDir . $fileName;
    }

    if (move_uploaded_file($fileTmp, $targetFile)) {
        echo "<h3>✅ Файл успішно завантажено!</h3>";
        echo "<p>Ім'я файлу: $fileName</p>";
        echo "<p>Тип файлу: $fileType</p>";
        echo "<p>Розмір: " . round($fileSize / 1024, 2) . " КБ</p>";
        echo "<p><a href='$targetFile' download>⬇️ Завантажити файл</a></p>";
    } else {
        echo "❌ Помилка під час завантаження файлу.";
    }
} else {
    echo "⚠️ Файл не був завантажений.";
}

echo "<br><br><a href='index.html'>⬅️ Повернутись назад</a>";
?>
