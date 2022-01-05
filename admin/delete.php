<?php
// This page is to delete products using administrator products.php page by clicking the delete button
require_once('../model/config.php');
require_once('../model/product.php');
$id = $_GET['id'];

if(isset($id)){
    $product = new product();
    $product->removeProduct($id);
}