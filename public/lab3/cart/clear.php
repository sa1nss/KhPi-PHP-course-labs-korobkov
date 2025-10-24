<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['cart']);
}
header('Location: view.php');
exit;
