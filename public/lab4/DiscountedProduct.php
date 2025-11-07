<?php
require_once 'Product.php';

class DiscountedProduct extends Product {
    private float $discount;

    public function __construct(string $name, float $price, string $description, float $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice(): float {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getInfo(): string {
        $discountedPrice = $this->getDiscountedPrice();
        return "Назва: {$this->name}<br>" .
               "Ціна без знижки: {$this->price} грн<br>" .
               "Знижка: {$this->discount}%<br>" .
               "Нова ціна: {$discountedPrice} грн<br>" .
               "Опис: {$this->description}<br><br>";
    }
}
