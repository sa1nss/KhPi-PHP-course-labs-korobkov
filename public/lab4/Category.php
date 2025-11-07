<?php
require_once 'Product.php';
require_once 'DiscountedProduct.php';

class Category {
    public string $name;
    private array $products = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function addProduct(Product $product): void {
        $this->products[] = $product;
    }

    public function showProducts(): string {
        $output = "<h3>Категорія: {$this->name}</h3>";
        foreach ($this->products as $product) {
            $output .= $product->getInfo();
        }
        return $output;
    }
}
