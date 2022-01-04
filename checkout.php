<?php
include('templates/header.php');


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


<div class="container" style="margin-top:140px">

    <div class="row">

        <div class="col">

            <span class="fs-3 fw-bold">Checkout</span>
            <hr>

            <div class="card shadow-sm">
                <div class="card-header">
                    <span class="fs-6 fw-bold">DELIVERY ADDRESS</span>
                </div>
                <div class="card-body">
                    <p><b>Syed Akif (013-9356443)</b> 4733, Jalan Cengkih, Kg. Jabur Kubur 24000 Kemaman, Terengganu.</p>
                </div>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <span class="fs-6 fw-bold">ORDER DETAILS</span>
                </div>
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
                                        <?= $item['quantity'] ?>
                                    </td>

                                </tr>

                            <?php

                                $total_qty += $item['quantity'];
                                $total_price += ($item['price'] * $item['quantity']);
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card shadow-sm mt-3">
                <div class="card-header">
                    <span class="fs-6 fw-bold">PAYMENT METHOD</span>
                </div>
                <div class="card-body">

                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-dark product-name" for="btnradio1">Maybank2u</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-dark product-name" for="btnradio2">Credit Card Installment</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-dark product-name" for="btnradio3">Online Banking</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                        <label class="btn btn-outline-dark product-name" for="btnradio3">Credit / Debit Card</label>
                    </div>
                    <hr>


                    <div class="row d-flex">
                        <div class="col text-end">

                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td class="align-middle">Subtotal : </td>
                                        <td class="align-middle">RM <?= $total_price ?>.00</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Shipping Total : </td>
                                        <td class="align-middle">RM 10.00</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Total Payment : </td>
                                        <td class="align-middle" style="width: 150px;"><span class="fw-bold fs-5"> RM <?= $total_price + 10 ?>.00</td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>
                            <a href="checkout.php" class="btn btn-dark fw-bold">PLACE ORDER</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>



<?php include('templates/footer.php') ?>