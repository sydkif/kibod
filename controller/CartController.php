<?php
session_start();

require_once('../model/cart.php');

$userCart = new Cart();
$productJson = $userCart->getUserCart($_SESSION['username']);
$product = json_decode($productJson, true);

if (isset($_POST['addToCart'])) {

    if (isset($_SESSION['username'])) {

        $productJson = $userCart->getUserCart($_SESSION['username']);
        $product = json_decode($productJson, true);
        $existed = $userCart->productExisted($_SESSION['username'], $_POST['id']);

        $array = array(
            'qty' => $_POST['qty'],
            'name' => $_POST['name'],
            'image' => $_POST['image'],
            'price' => $_POST['price']
        );

        $cart_data[$_POST['id']] = $array;

        $final_data = json_encode($cart_data);

        if ($existed) {
            $_SESSION['alert'] = "warning";
            $_SESSION['msg'] = "<b>" . $_POST['name'] . "</b> already existed in cart.";
        } else {
            $userCart->addToCart($_SESSION['username'], $final_data);
            $_SESSION['alert'] = "success";
            $_SESSION['msg'] = "<b>" . $_POST['name'] . "</b> added to cart.";
        }
        header("Location: ../" . $_POST['url']);
    } else {
        Header('Location: ../login.php');
    }
}

if (isset($_POST['buyNow'])) {
    if (isset($_SESSION['username'])) {

        $productJson = $userCart->getUserCart($_SESSION['username']);
        $product = json_decode($productJson, true);
        $existed = $userCart->productExisted($_SESSION['username'], $_POST['id']);

        $array = array(
            'qty' => $_POST['qty'],
            'name' => $_POST['name'],
            'image' => $_POST['image'],
            'price' => $_POST['price']
        );

        $cart_data[$_POST['id']] = $array;

        $final_data = json_encode($cart_data);

        if (!$existed) {
            $userCart->addToCart($_SESSION['username'], $final_data);
        }

        Header('Location: ../cart.php');
    } else {
        Header('Location: ../login.php');
    }
}

if (isset($_POST['checkout'])) {

    $x = 0;
    foreach ($product as $product_id) {
        foreach ($product_id as $item) {
            if (key($product_id) == $_POST['id-' . key($product_id)]) {
                $product[$x][key($product_id)]['qty'] = $_POST['quantity-' . key($product_id)];
                $x++;
            }
        }
    }

    $updatedProduct = json_encode($product);
    $userCart->updateUserCart($_SESSION['username'], $updatedProduct);

    Header('Location: ../checkout.php');
}

if (isset($_POST['delete'])) {
    $x = key($_POST['delete']);
    unset($product[$x]);
    $product = array_values($product);
    $updatedProduct = json_encode($product);
    $userCart->updateUserCart($_SESSION['username'], $updatedProduct);
    Header('Location: ../cart.php');
}
