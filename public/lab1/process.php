<?php
$firstName = trim($_POST["firstName"] ?? "");
$lastName = trim($_POST["lastName"] ?? "");
if ($firstName === "" || $lastName === "") {
    echo "Помилка: усі поля обов’язкові!";
    exit;
}
if (!is_string($firstName) || !is_string($lastName)) {
    echo "Помилка: некоректні дані!";
    exit;
}
$firstName = htmlspecialchars($firstName);
$lastName = htmlspecialchars($lastName);
echo "<h2>Результат</h2>";
echo "Привіт, $firstName $lastName!";
?>
