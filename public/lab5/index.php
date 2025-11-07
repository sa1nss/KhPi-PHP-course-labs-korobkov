<?php
declare(strict_types=1);

require_once __DIR__ . '/BankAccount.php';
require_once __DIR__ . '/SavingsAccount.php';

$log = [];

try {
    $checking = new BankAccount('UAH', 1500);
    $log[] = "Створено поточний рахунок: {$checking}";

    $checking->deposit(500);
    $log[] = "Поповнення +500 → {$checking}";

    $checking->withdraw(400);
    $log[] = "Зняття -400 → {$checking}";

    $savings = new SavingsAccount('USD', 200);
    $log[] = "Створено ощадний рахунок: {$savings} (ставка " . SavingsAccount::getInterestRate() . "%)";

    $savings->deposit(50);
    $log[] = "Поповнення +50 → {$savings}";

    SavingsAccount::setInterestRate(7.5);
    $savings->applyInterest();
    $log[] = "Нараховано відсотки (7.5%) → {$savings}";

    try {
        $checking->withdraw(10000);
    } catch (Throwable $e) {
        $log[] = "Помилка зняття: " . $e->getMessage();
    }

    try {
        $savings->deposit(-10);
    } catch (Throwable $e) {
        $log[] = "Помилка поповнення: " . $e->getMessage();
    }

} catch (Throwable $e) {
    $log[] = "Критична помилка: " . $e->getMessage();
}
?>
<!doctype html>
<html lang="uk">
<head>
  <meta charset="utf-8">
  <title>Лабораторна 5 — ООП, банківські рахунки</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<header>
  <h1>Лабораторна робота №5 — ООП (PHP)</h1>
  <p class="subtitle">Інтерфейси, константи, винятки, спадкування, статичні властивості</p>
</header>

<main>
  <section class="card">
    <h2>Журнал операцій</h2>
    <ul class="log">
      <?php foreach ($log as $row): ?>
        <li><?= htmlspecialchars($row, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li>
      <?php endforeach; ?>
    </ul>
  </section>

  <section class="card info">
    <h3>Реалізовано</h3>
    <ul>
      <li>Інтерфейс <code>AccountInterface</code> (deposit, withdraw, getBalance)</li>
      <li>Клас <code>BankAccount</code> з константою <code>MIN_BALANCE</code> та винятками</li>
      <li>Клас <code>SavingsAccount</code> зі статичною відсотковою ставкою та методом <code>applyInterest()</code></li>
      <li>Демонстрація з обробкою помилок (див. «Журнал операцій»)</li>
    </ul>
  </section>
</main>

<footer>
  <p>© Лабораторна 5. PHP 8+</p>
</footer>
</body>
</html>
