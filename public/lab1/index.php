<?php
echo "<h2>Part 1</h2>";
echo "Hello, World!<br><br>";

echo "<h2>Part 2</h2>";
$string = "Привіт, PHP!";
$integer = 25;
$float = 3.14;
$boolean = false;
echo "Рядок: $string<br>";
echo "Ціле: $integer<br>";
echo "Дробове: $float<br>";
echo "Булеве: " . ($boolean ? "true" : "false") . "<br><br>";
var_dump($string);
echo "<br>";
var_dump($integer);
echo "<br>";
var_dump($float);
echo "<br>";
var_dump($boolean);
echo "<br><br>";

echo "<h2>Part 3</h2>";
$first = "Харківський";
$second = "політех";
$result = $first . " " . $second;
echo "Результат: $result<br><br>";

echo "<h2>Part 4</h2>";
$num = 9;
if ($num % 2 === 0) {
    echo "Число $num є парним<br><br>";
} else {
    echo "Число $num є непарним<br><br>";
}

echo "<h2>Part 5</h2>";
echo "For (1 → 10): ";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br>";
echo "While (10 → 1): ";
$j = 10;
while ($j >= 1) {
    echo $j . " ";
    $j--;
}
echo "<br><br>";

echo "<h2>Part 6</h2>";
$student = [
    "firstName" => "Данііл",
    "lastName" => "Коробков",
    "age" => 19,
    "speciality" => "Компьютерні науки"
];
foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}
$student["avgMark"] = 92.3;
echo "<br>Оновлений масив:<br>";
