<?php
class Product {
    public string $name;
    public string $description;
    protected float $price;

    public function __construct(string $name, float $price, string $description) {
        if ($price < 0) {
            throw new Exception("Ціна не може бути від’ємною");
        }
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getInfo(): string {
        return "Назва: {$this->name}<br>" .
               "Ціна: {$this->price} грн<br>" .
               "Опис: {$this->description}<br><br>";
    }
}
