<?php
require_once 'Product.php';
require_once 'DiscountedProduct.php';
require_once 'Category.php';

$product1 = new Product("Ноутбук Lenovo", 28000, "Надійний офісний ноутбук");
$product2 = new Product("Мишка Logitech", 800, "Бездротова мишка з сенсором");

$discounted1 = new DiscountedProduct("Телефон Samsung", 18000, "Смартфон з AMOLED дисплеєм", 15);
$discounted2 = new DiscountedProduct("Навушники Sony", 3200, "Повнорозмірні навушники", 10);

$category1 = new Category("Електроніка");
$category1->addProduct($product1);
$category1->addProduct($discounted1);

$category2 = new Category("Аксесуари");
$category2->addProduct($product2);
$category2->addProduct($discounted2);

echo $category1->showProducts();
echo $category2->showProducts();
