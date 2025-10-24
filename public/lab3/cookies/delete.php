<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie('user_name', '', time() - 3600, "/");
    unset($_COOKIE['user_name']);
}
header('Location: index.php');
exit;
