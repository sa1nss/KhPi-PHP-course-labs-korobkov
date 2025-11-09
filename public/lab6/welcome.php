<?php require __DIR__.'/auth.php'; ?>
<!doctype html>
<html lang="uk">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Вітаємо!</title>
<link rel="stylesheet" href="/lab6/welcome.css">
</head>
<body>
<div class="card">
<h1>Вітаємо, <?= htmlspecialchars($_SESSION['user']['username']) ?>!</h1>
<p>Це захищена сторінка. Доступ лише після успішного входу.</p>
<a class="btn" href="logout.php">Вийти</a>
</div>
</body>
</html>