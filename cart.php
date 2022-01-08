<?php

include('templates/header.php');

if (!isset($_SESSION['username']))
    Header('Location: login.php');

$userCart = new Cart();
$productJson = $userCart->getUserCart($_SESSION['username']);
$product = json_decode($productJson, true);

?>

<div class="container" style="margin-top: 140px;">

    <div class="row">

        <div class="col">

            <span class="fs-2 fw-bold">Cart</span>

            <hr>

            <div class="card">
                <div class="card-body">

                    <form action="controller/CartController.php" method="post">
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

                                <?php
                                $x = 0;
                                foreach ($product as $product_id) {

                                    foreach ($product_id as $item) {
                                ?>

                                        <tr>

                                            <td class="align-middle" style="width: 1px;"><img class="cart-img" src="<?= $item['image'] ?>" alt=""></td>
                                            <td class="align-middle text-left">
                                                <a href="product-detail.php?id=<?= key($product_id) ?>" class="text-decoration-none text-muted">
                                                    <?= $item['name'] ?></a>
                                            </td>
                                            <td class="align-middle text-center"><?= $item['price'] ?>.00</td>
                                            <td class="align-middle text-center">
                                                <input type="number" name="quantity-<?= key($product_id) ?>" id="" value="<?= $item['qty'] ?>" style="width:48px;" min="1">
                                            </td>
                                            <td class="align-middle text-center">
                                                <button type="submit" name="delete[<?= $x++ ?>]" class="btn btn-danger btn-sm cart" onclick="return confirm('Are you sure?');">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                            <input type="hidden" name="id-<?= key($product_id)  ?>" value="<?= key($product_id)  ?>">
                                        </tr>

                                <?php
                                    }
                                } ?>

                            </tbody>
                        </table>

                        <div class="row d-flex">
                            <div class="col text-end">

                                <?php

                                if ($userCart->isEmpty($_SESSION['username']))
                                    echo 'Your cart is empty.';
                                else
                                    echo '<button type="submit" name="checkout" class="btn btn-dark fw-bold">CHECKOUT</button>';
                                ?>


                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include('templates/footer.php') ?>