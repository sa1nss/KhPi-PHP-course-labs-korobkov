<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

$products = [
  ['id'=>1,'title'=>'Ручка','price'=>10],
  ['id'=>2,'title'=>'Блокнот','price'=>30],
  ['id'=>3,'title'=>'Кружка','price'=>120],
];

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Кошик — Товари</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <h1>Кошик — Додати товари</h1>
  <a href="../index.php">← Назад</a> | <a href="view.php">Переглянути кошик</a>

  <?php foreach ($products as $p): ?>
  <div class="product">
    <div>
      <strong><?=$p['title']?></strong><br>Ціна: <?=$p['price']?> грн
    </div>
    <form method="post" action="add.php">
      <input type="hidden" name="id" value="<?=$p['id']?>">
      <input type="number" name="qty" value="1" min="1" style="width:60px;">
      <button type="submit">Додати</button>
    </form>
  </div>
  <?php endforeach; ?>
</body>
</html>
