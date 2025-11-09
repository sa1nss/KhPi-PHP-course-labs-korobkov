<?php
session_start();
require_once __DIR__.'/config/db.php';


$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';


$stmt = $pdo->prepare('SELECT id, username, email, password FROM users WHERE username = ? LIMIT 1');
$stmt->execute([$username]);
$user = $stmt->fetch();


if (!$user || !password_verify($password, $user['password'])) {
$error = 'Невірні облікові дані.';
} else {
$_SESSION['user'] = [
'id' => $user['id'],
'username' => $user['username'],
'email' => $user['email'],
];
header('Location: /welcome.php');
exit;
}
}
?>
<!doctype html>
<html lang="uk">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Вхід</title>
<link rel="stylesheet" href="/lab6/index.css">
</head>
<body>
<div class="container">
<h1>Вхід до системи</h1>
<?php if ($error): ?><div class="alert"><?= htmlspecialchars($error) ?></div><?php endif; ?>


<form class="form" method="post" autocomplete="off">
<input class="input" type="text" name="username" placeholder="Імʼя користувача" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
<input class="input" type="password" name="password" placeholder="Пароль" required>
<button class="btn" type="submit">Увійти</button>
<div class="nav"><a href="register.php">Створити акаунт</a></div>
</form>
</div>
</body>
</html>