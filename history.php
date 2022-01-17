<?php

include('templates/header.php');
require_once('model/user.php');

if (!isset($_SESSION['username']))
    Header('Location: login.php');

$user = new User();
$history = $user->getPurchaseHistory($_SESSION['username']);
$total_qty = 0;
$total_price = 0;


?>

<div class="container" style="margin-top: 140px;">

    <div class="row">

        <div class="col">

            <span class="fs-2 fw-bold">Purchase History</span>

            <hr>

            <?php

            foreach ($history as $purchase) {

                $product = json_decode($purchase['products'], true);
            ?>

                <div class="card shadow-sm mb-4">
                    <div class="card-header">
                        <b>Order ID: </b><?= $purchase['order_id'] ?>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2">Product</th>
                                        <th scope="col" class="text-end">Price</th>
                                        <th scope="col" class="text-end">Qty</th>
                                    </tr>
                                </thead>


                                <?php foreach ($product as $product_id) {

                                    foreach ($product_id as $item) { ?>

                                        <tr>
                                            <td style="width:1px"><img src="<?= $item['image'] ?>" alt="" height="80px"></td>
                                            <td class="align-middle text-left">
                                                <a href="product-detail.php?id=<?= key($product_id) ?>" class="text-decoration-none text-dark"><?= $item['name'] ?></a>
                                            </td>
                                            <td class="align-middle text-end"><?= $item['price'] ?>.00</td>
                                            <td class="align-middle text-end">
                                                <?= $item['qty'] ?>
                                            </td>

                                        </tr>

                                <?php

                                        $total_qty += $item['qty'];
                                        $total_price += ($item['price'] * $item['qty']);
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="align-middle fw-bold text-end">Total Paid : </td>
                                    <td class="align-middle text-end" style="width: 140px;"><span class="fw-bold fs-5"> RM <?= $total_price += 10 ?>.00</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                        <b>Date Purchased: </b><?= $purchase['date_created'] ?>
                    </div>
                </div>
            <?php
                $total_qty = 0;
                $total_price = 0;
            } ?>

        </div>
    </div>
</div>

<?php include('templates/footer.php') ?>