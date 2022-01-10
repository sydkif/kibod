<?php include('templates/header.php');

if (!isset($_SESSION['username']))
    Header('Location: login.php');

if (isset($_POST['pay'])) {
    $deliveryInfo = $_POST['delivery_address'];
    $totalPayment = $_POST['total_payment'];

    $userCart = new Cart();
    $checkout = $userCart->getUserCart($_SESSION['username']);
    $product = json_decode($checkout, true);
    $orderId = time() . mt_rand(000, 999);

    $userCart->completePayment($_SESSION['username'], $orderId);
} else {
    Header('Location: cart.php');
}

?>

<div class="container" style="margin-top: 150px;">

    <div class="row d-flex justify-content-center align-items-center py-5">

        <div class="col-12 col-md-10 col-lg-8 col-xl-6">

            <div class="card bg-white shadow-sm" style="border-radius:1rem;">

                <div class="card-body px-4">

                    <div class="mb-md-3 mt-md-3">

                        <div class="text-center">
                            <img src="img/logo.png" alt="" style="height: 160px" class="filter-gray">
                            <h3 class="fs-4 fw-bold mb-3 mt-3">Payment Receipt</h3>
                            Order ID: <?= $orderId ?>
                            <hr>
                        </div>

                        <span class="small-label mt-4 fw-bold" style="font-size: 12px;">DELIVERY ADDRESS</span>
                        <p><?= $deliveryInfo ?></p>
                        <hr>
                        <span class="small-label mt-4 fw-bold" style="font-size: 12px;">PRODUCT DETAILS</span>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ITEM</th>
                                    <th class="text-center" scope="col">PRICE</th>
                                    <th class="text-center" scope="col">QUANTITY</th>
                                    <th class="text-center" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($product as $product_id) {

                                    foreach ($product_id as $item) { ?>

                                        <tr>
                                            <td class="align-middle text-left">
                                                <?= $item['name'] ?>
                                            </td>
                                            <td class="align-middle text-center"><?= $item['price'] ?>.00</td>
                                            <td class="align-middle text-center">
                                                <?= $item['qty'] ?>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                        <hr>
                        <span class="small-label mt-4 fw-bold" style="font-size: 12px;">TOTAL PAYMENT</span>
                        <p class="fs-3 fw-bold">RM<?= $totalPayment ?>.00</p>

                        <hr>
                        <div class="text-center"><br>
                            <p class="gray-text">Please keep this receipt for future reference</p>
                        </div>

                    </div>



                </div>

            </div>

        </div>

    </div>

</div>

<?php include('templates/footer.php'); ?>