<?php

include('templates/header.php');


// $cart_items = array(
//     array('FULL SIZED', 'full', 'full-sized.svg', 'Most likely same layout you currently have.')
// );

$cart_items = array(
    array(
        "image" => "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-blue-switches-mac-windows-layout_1800x1800.jpg?v=1631097816",
        "name" => "K10 RGB Backlit Blue Switch",
        "price" => "84",
        "quantity" => "2"
    ), array(
        "image" => "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K2-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-red-with-type-C-RGB-white-backlight_9cb9d3e6-a5ac-4ac5-becb-079c7103ed2f_1800x1800.jpg?v=1621223999",
        "name" => "K2 RGB Backlit Red Switch",
        "price" => "69",
        "quantity" => "3"
    ), array(
        "image" => "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-brown_1800x1800.jpg?v=1618315916",
        "name" => "K12 Non Backlit Brown Switch",
        "price" => "59",
        "quantity" => "1"
    )
);

$x = 1;
$total_qty = 0;
$total_price = 0;

?>

<div class="container" style="margin-top: 140px;">

    <div class="row">

        <div class="col">

            <span class="fs-2 fw-bold">Cart</span>

            <hr>

            <div class="card">
                <div class="card-body">



                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col" colspan="2">ITEM</th>
                                <th class="text-center" scope="col">PRICE</th>
                                <th class="text-center" scope="col">QUANTITY</th>
                                <th class="text-center" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($cart_items as $item) { ?>

                                <tr>

                                    <td class="align-middle" style="width: 1px;"> <img class="cart-img" src="<?= $item['image'] ?>" alt=""></td>
                                    <td class="align-middle text-left">
                                        <?= $item['name'] ?>
                                    </td>
                                    <td class="align-middle text-center"><?= $item['price'] ?>.00</td>
                                    <td class="align-middle text-center">
                                        <input type="number" name="quantity" id="" value="<?= $item['quantity'] ?>" style="width:36px;">
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-danger btn-sm cart"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                
                            <?php } ?>

                        </tbody>
                    </table>

                    <div class="row d-flex">
                        <div class="col text-end">
                            <a href="checkout.php" class="btn btn-dark fw-bold ">CHECKOUT</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include('templates/footer.php') ?>