<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

$greeting = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    if ($name !== '') {
        setcookie('user_name', $name, time() + 7 * 24 * 3600, "/");
        $_COOKIE['user_name'] = $name;
        $greeting = "Привіт, " . htmlspecialchars($name) . "!";
    }
} else {
    if (!empty($_COOKIE['user_name'])) {
        $greeting = "Вітаємо з поверненням, " . htmlspecialchars($_COOKIE['user_name']) . "!";
    }
}
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Cookies — Ім'я користувача</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Cookies — Ім'я користувача</h1>
  <a href="../index.php">← Назад</a>

  <?php if ($greeting): ?>
    <div class="box"><?= $greeting ?></div>
  <?php endif; ?>

  <form method="post">
    <label for="name">Введіть своє ім'я:</label>
    <input id="name" name="name" type="text" required>
    <button type="submit">Зберегти cookie (7 днів)</button>
  </form>

  <?php if (!empty($_COOKIE['user_name'])): ?>
    <form method="post" action="delete.php">
      <button type="submit">Видалити cookie</button>
    </form>
  <?php endif; ?>
</body>
</html>
