<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$client_ip = $_SERVER['REMOTE_ADDR'] ?? 'Н/Д';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Н/Д';
$script_name = $_SERVER['PHP_SELF'] ?? 'Н/Д';
$request_method = $_SERVER['REQUEST_METHOD'] ?? 'Н/Д';
$real_path = __FILE__;
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>$_SERVER — Інформація</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Інформація з $_SERVER</h1>
  <a href="../index.php">← Назад</a>

  <div class="box">
    <p><strong>IP клієнта:</strong> <?=htmlspecialchars($client_ip)?></p>
    <p><strong>Браузер:</strong> <?=htmlspecialchars($user_agent)?></p>
    <p><strong>Скрипт:</strong> <?=htmlspecialchars($script_name)?></p>
    <p><strong>Метод:</strong> <?=htmlspecialchars($request_method)?></p>
    <p><strong>Шлях до файлу:</strong> <?=htmlspecialchars($real_path)?></p>
  </div>
</body>
</html>
