<?php
require_once __DIR__ . '/lib/helpers.php';
ensure_session();
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Лабораторна №3 — Cookies, Sessions, Server</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Лабораторна №3 — PHP: $_COOKIE, $_SESSION, $_SERVER</h1>
  <nav>
    <a href="cookies/index.php">Cookies (ім'я користувача)</a> |
    <a href="session_login/index.php">Сесія (вхід)</a> |
    <a href="server_info/index.php">Інформація про сервер</a> |
    <a href="cart/index.php">Кошик</a>
  </nav>

  <section>
    <h2>Огляд</h2>
    <p>Реалізація завдань: збереження cookie і сесій, вивід $_SERVER, кошик з використанням сесій і cookie (попередні покупки).</p>

    <?php if (isset($_SESSION['user'])): ?>
      <div class="box">
        <p>Привіт, <strong><?=htmlspecialchars($_SESSION['user']['login'])?></strong>! <a href="session_login/logout.php">Вийти</a></p>
        <p>Остання активність: <?=date('H:i:s', $_SESSION['last_activity'])?></p>
      </div>
    <?php else: ?>
      <p>Ви не увійшли в систему.</p>
    <?php endif; ?>

    <form method="post" action="server_info/index.php">
      <button type="submit">Переглянути інформацію про сервер (POST)</button>
    </form>
  </section>
</body>
</html>
