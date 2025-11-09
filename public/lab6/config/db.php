<?php
require_once __DIR__.'/config.php';


$dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET;
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,
];


try {
$pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (Throwable $e) {
http_response_code(500);
exit('Помилка зʼєднання з базою даних.');

}