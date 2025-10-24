<?php
require_once __DIR__ . '/../lib/helpers.php';
ensure_session();

session_unset();
session_destroy();
header('Location: ../index.php');
exit;
