<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

$msg = '';

if (isset($_SESSION['user'])) {
    $msg = "Ви вже увійшли як " . htmlspecialchars($_SESSION['user']['login']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $valid_login = 'student';
    $valid_password = 'password123';

    if ($login === $valid_login && $password === $valid_password) {
        $_SESSION['user'] = ['login' => $login];
        $_SESSION['last_activity'] = time();
        header('Location: ../index.php');
        exit;
    } else {
        $msg = 'Невірний логін або пароль.';
    }
}
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Сесія — Вхід</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Сесія — Вхід</h1>
  <a href="../index.php">← Назад</a>

  <?php if ($msg): ?><div class="box"><?=$msg?></div><?php endif; ?>

  <?php if (!isset($_SESSION['user'])): ?>
  <form method="post">
    <label for="login">Логін:</label>
    <input id="login" name="login" type="text" required>

    <label for="password">Пароль:</label>
    <input id="password" name="password" type="password" required>

    <button type="submit">Увійти</button>
  </form>
  <?php else: ?>
    <p><a href="logout.php">Вийти</a></p>
  <?php endif; ?>
</body>
</html>
