<?php
session_start();
$isAuth = !empty($_SESSION['user']);
?>
<!doctype html>
<html lang="uk">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Лаба 6 — Авторизація</title>
<link rel="stylesheet" href="/lab6/index.css">
</head>
<body>
<div class="container">
<h1>Лабораторна №6: Авторизація та реєстрація</h1>
<p>PHP + MySQL (PDO), сесії, підготовлені запити, хешування паролів.</p>


<?php if ($isAuth): ?>
<div class="alert">Ви увійшли як <b><?= htmlspecialchars($_SESSION['user']['username']) ?></b>.</div>
<div class="nav">
<a class="btn" href="welcome.php">Перейти на захищену сторінку</a>
<a class="btn" href="logout.php">Вийти</a>
</div>
<?php else: ?>
<div class="nav">
<a class="btn" href="register.php">Зареєструватися</a>
<a class="btn" href="login.php">Увійти</a>
</div>
<?php endif; ?>
</div>
</body>
</html>