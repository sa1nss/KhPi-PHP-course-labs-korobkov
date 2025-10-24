<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);
    $qty = max(1, intval($_POST['qty'] ?? 1));

    $items = [
        1 => ['id'=>1,'title'=>'Ручка','price'=>10],
        2 => ['id'=>2,'title'=>'Блокнот','price'=>30],
        3 => ['id'=>3,'title'=>'Кружка','price'=>120],
    ];

    if (isset($items[$id])) {
        if (!isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id] = 0;
        $_SESSION['cart'][$id] += $qty;

        $prev = [];
        if (!empty($_COOKIE['previous_purchases'])) {
            $decoded = json_decode($_COOKIE['previous_purchases'], true);
            if (is_array($decoded)) $prev = $decoded;
        }
        if (!isset($prev[$id])) $prev[$id] = 0;
        $prev[$id] += $qty;
        setcookie('previous_purchases', json_encode($prev), time() + 365*24*3600, "/");
    }
}
header('Location: index.php');
exit;
