<?php
session_start();
require_once __DIR__ . '/config/db.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || mb_strlen($username) < 3) {
        $errors[] = 'Імʼя користувача має містити щонайменше 3 символи.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Некоректна електронна пошта.';
    }
    if (mb_strlen($password) < 6) {
        $errors[] = 'Пароль має містити щонайменше 6 символів.';
    }

    if (!$errors) {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1');
        $stmt->execute([$username, $email]);
        if ($stmt->fetch()) {
            $errors[] = 'Користувач з таким імʼям або e-mail вже існує.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $passwordMd5 = md5($password);
            $ins = $pdo->prepare('INSERT INTO users (username, email, password, password_md5) VALUES (?, ?, ?, ?)');
            $ins->execute([$username, $email, $passwordHash, $passwordMd5]);
            $success = 'Реєстрація успішна! Тепер увійдіть.';
        }
    }
}
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Реєстрація</title>
  <link rel="stylesheet" href="/lab6/index.css">
</head>
<body>
  <div class="container">
    <h1>Реєстрація</h1>
    <?php if ($errors): ?>
      <div class="alert">
        <?php foreach ($errors as $e): ?>
          <div><?= htmlspecialchars($e) ?></div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if ($success): ?>
      <div class="alert"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form class="form" method="post" autocomplete="off">
      <input class="input" type="text" name="username" placeholder="Імʼя користувача" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
      <input class="input" type="email" name="email" placeholder="Електронна пошта" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
      <input class="input" type="password" name="password" placeholder="Пароль" required>
      <button class="btn" type="submit">Зареєструватися</button>
      <div class="nav"><a href="login.php">Вже маєте акаунт? Увійти</a></div>
    </form>
  </div>
</body>
</html>
