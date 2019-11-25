<?php

$xml = simplexml_load_file('products.xml');
$products = $xml->xpath("/products/product[sku='soft_pro_reporting']/name");
$products = $xml->xpath("/products/product[@category='software' and price > 2500]/name");
var_dump($products);
$products = $xml->xpath("/products/product[attribute::category='software' and price < 2500]/name");
var_dump($products);
