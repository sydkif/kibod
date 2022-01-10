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

            <div class="card shadow-sm">
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ORDER ID</th>
                                <th class="text-center" scope="col">PRODUCT LIST</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            foreach ($history as $purchase) {

                                $product = json_decode($purchase['products'], true);
                            ?>
                                <tr>
                                    <td class="fw-bold"><?= $purchase['order_id'] ?></td>
                                    <td>
                                        <table class="table table-borderless">
                                            <tbody>

                                                <?php foreach ($product as $product_id) {

                                                    foreach ($product_id as $item) { ?>

                                                        <tr>

                                                            <td class="align-middle text-left" colspan="2">
                                                                <?= $item['name'] ?>
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

                                                <tr>
                                                    <td class="text-end border-dark fw-bold" colspan="2">TOTAL (RM): </td>
                                                    <td class="text-end border-dark fw-bold"><?= $total_price ?>.00</td>
                                                    <td class="text-end border-dark fw-bold"><?= $total_qty ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-end" colspan="5"><b>DATE PURCHASED: </b><?= $purchase['date_created'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
</div>

<?php include('templates/footer.php') ?>