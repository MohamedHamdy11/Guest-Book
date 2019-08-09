<?php
include('includes/config.php');
include('includes/products.class.php');

$productsObject = new products();
$products = $productsObject->getProducts('ORDER BY `id` DESC');

$selected = 'products';
include('templates/front/header.html');
include('templates/front/products.html');
include('templates/front/footer.html');
