<?php
class StaticStore {
    public static $cached = null;

    public static function get() {
        if (self::$cached !== null) {
            return self::$cached;
        }
        sleep(2);
        self::$cached = "Результат: " . rand(1000, 9999);
        return self::$cached;
    }
}

echo "<h1>Статичний кеш</h1>";
echo StaticStore::get();
