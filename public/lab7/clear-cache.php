<?php
session_start();

if (file_exists("report_cache.html")) unlink("report_cache.html");
session_destroy();

echo "Кеш очищено успішно.";
