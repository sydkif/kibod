<?php

include('templates/header.php');
require_once('model/product.php');

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'full')
        $type = 'Full-Sized';
    elseif ($_GET['type'] == 'tkl')
        $type = 'Tenkeyless';
    elseif ($_GET['type'] == '75')
        $type = '75%';
    elseif ($_GET['type'] == '65')
        $type = '65%';
    elseif ($_GET['type'] == '60')
        $type = '60%';
    else
        Header('Location: index.php');
} else {
    Header('Location: index.php');
}

?>


<div class="container" style="margin-top: 100px;">

    <div class="row">
        <div class="col mt-4">

            <span class="fs-2 fw-bold"><?= $type ?> Keyboard Collection</span>
            <hr>
        </div>
    </div>

    <div class="row">

        <?php

        $product = new product();
        $productList = $product->getProductList();

        foreach ($productList as $p) {

            if ($p['type'] == $_GET['type']) {

        ?>

                <div class="col-6 col-md-6 col-lg-4 col-xxl-3 mt-4 mb-3">
                    <form action="test.php" method="POST">
                        <a href="product-detail.php?id=<?= $p['id'] ?>" class="text-decoration-none text-dark">
                            <div class="card product shadow-sm">
                                <img src="<?= $p['image'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-title product-name"><?= $p['name'] ?></p>
                                    <p class="card-text fw-bold">RM <?= $p['price'] ?></p>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <button type="" class="btn btn-outline-dark btn-sm fw-bold w-100">Add to Cart</button>

                                        </div>
                                        <div class="col-12 col-md-6">
                                            <button type="submit" class="btn btn-dark btn-sm fw-bold w-100">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <input type="hidden" name="image" value="<?= $p['image'] ?>">
                        <input type="hidden" name="name" value="<?= $p['name'] ?>">
                        <input type="hidden" name="price" value="<?= $p['price'] ?>">
                        <input type="hidden" name="id" value="<?= $p['id'] ?>">

                    </form>
                </div>


        <?php
            }
        } ?>

    </div>
</div>


<?php include('templates/footer.php'); ?>