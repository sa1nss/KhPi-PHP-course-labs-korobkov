<?php
$cacheFile = "report_cache.html";
$cacheTime = 600;

if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    echo file_get_contents($cacheFile);
    exit;
}

sleep(3);

$table = "<h1>Звіт (оновлено: " . date("H:i:s") . ")</h1><table border='1' cellpadding='5'>";
for ($i = 1; $i <= 1000; $i++) {
    $table .= "<tr><td>Рядок $i</td><td>" . rand(100, 999) . "</td></tr>";
}
$table .= "</table>";

file_put_contents($cacheFile, $table);
echo $table;
