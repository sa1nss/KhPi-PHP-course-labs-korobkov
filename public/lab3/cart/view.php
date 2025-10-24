<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

$items = [
  1=>['id'=>1,'title'=>'Ручка','price'=>10],
  2=>['id'=>2,'title'=>'Блокнот','price'=>30],
  3=>['id'=>3,'title'=>'Кружка','price'=>120],
];

$cart = $_SESSION['cart'] ?? [];
$total = 0;

$prev_purchases = [];
if (!empty($_COOKIE['previous_purchases'])) {
    $decoded = json_decode($_COOKIE['previous_purchases'], true);
    if (is_array($decoded)) $prev_purchases = $decoded;
}
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Кошик — Перегляд</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Кошик — Перегляд</h1>
  <a href="index.php">← Назад</a>

  <h2>Поточний кошик</h2>
  <?php if (!$cart): ?>
    <p>Кошик порожній.</p>
  <?php else: ?>
    <table border="1" cellspacing="0" cellpadding="6">
      <tr><th>Товар</th><th>Кількість</th><th>Ціна</th><th>Сума</th></tr>
      <?php foreach ($cart as $id=>$qty):
        $item=$items[$id];
        $sum=$item['price']*$qty; $total+=$sum; ?>
        <tr><td><?=$item['title']?></td><td><?=$qty?></td><td><?=$item['price']?></td><td><?=$sum?></td></tr>
      <?php endforeach; ?>
      <tr><td colspan="3"><strong>Разом</strong></td><td><strong><?=$total?> грн</strong></td></tr>
    </table>
    <form method="post" action="clear.php">
      <button type="submit">Очистити кошик</button>
    </form>
  <?php endif; ?>

  <h2>Попередні покупки</h2>
  <?php if (!$prev_purchases): ?>
    <p>Немає попередніх покупок.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($prev_purchases as $id=>$qty): ?>
        <li><?=$items[$id]['title']?> — <?=$qty?> шт.</li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>
