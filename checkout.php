<?php
include('templates/header.php');
require_once('model/cart.php');
require_once('model/user.php');

if (!isset($_SESSION['username']))
    Header('Location: login.php');

$userCart = new Cart();
$checkout = $userCart->getUserCart($_SESSION['username']);

$product = json_decode($checkout, true);

$x = 1;
$total_qty = 0;
$total_price = 0;

if ($userCart->isEmpty($_SESSION['username']))
    header('Location: cart.php');

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
                    <p><b>Lorem ipsum (01X-XXXXXXX)</b> Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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

                            <?php foreach ($product as $product_id) {

                                foreach ($product_id as $item) { ?>

                                    <tr>
                                        <td class="align-middle" style="width: 1px;"> <img class="cart-img" src="<?= $item['image'] ?>" alt=""></td>
                                        <td class="align-middle text-left">
                                            <?= $item['name'] ?>
                                        </td>
                                        <td class="align-middle text-center"><?= $item['price'] ?>.00</td>
                                        <td class="align-middle text-center">
                                            <?= $item['qty'] ?>
                                        </td>

                                    </tr>

                            <?php

                                    $total_qty += $item['qty'];
                                    $total_price += ($item['price'] * $item['qty']);
                                }
                            }
                            ?>

                            <tr>
                                <th class="text-end border-dark" colspan="2">Subtotal:</th>
                                <td class="text-center border-dark"><?= $total_price ?>.00</td>
                                <td class="text-center border-dark"><?= $total_qty ?></td>
                                <td class="border-dark"></td>

                            </tr>

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

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                        <label class="btn btn-outline-dark product-name" for="btnradio4">Credit / Debit Card</label>
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