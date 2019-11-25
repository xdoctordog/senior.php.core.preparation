<?php
$domDocument = new DomDocument();
$domDocument->load('products.xml');

$xpath = new DOMXPath($domDocument);
$products = $xpath->query("/products/product[sku='soft_tapes_abound']/name");

foreach ($products as $product) {
    var_dump($product->nodeValue);
}
