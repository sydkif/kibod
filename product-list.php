<?php

include('templates/header.php');
require_once('model/product.php');
require_once('model/cart.php');

if (isset($_GET['type'])) {
    if ($_GET['type'] == 'full')
        $title = 'Full-Sized Keyboard Collections';
    elseif ($_GET['type'] == 'tkl')
        $title = 'Tenkeyless Keyboard Collections';
    elseif ($_GET['type'] == '75')
        $title = '75% Keyboard Collections';
    elseif ($_GET['type'] == '65')
        $title = '65% Keyboard Collections';
    elseif ($_GET['type'] == '60')
        $title = '60% Keyboard Collections';
    $get = 'type=' . $_GET['type'];
} elseif (isset($_GET['search'])) {
    $title = 'Search keyword : ' . $_GET['search'];
    $search = $_GET['search'];
    $get = 'search=' . $_GET['search'];
} else {
    Header('Location: index.php');
}

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$_SESSION['last_page'] = basename($_SERVER['PHP_SELF']) . "?" . $get;

?>

<div class="container" style="margin-top: 100px;">

    <div class="row">
        <div class="col mt-4">

            <span class="fs-2 fw-bold"><?= $title ?></span>
            <hr>

            <?php if (isset($_SESSION['msg'])) { ?>
                <div class="alert alert-<?= $_SESSION['alert'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['msg'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
            $_SESSION['msg'] = null; ?>

        </div>
    </div>

    <div class="row">

        <?php

        $product = new Product();
        $productList = $product->getProductList();

        $per_page = 12;
        $count = 0 + (($page - 1) * 12);
        $total_count = 0;
        $item_num = 0;

        foreach ($productList as $key => $value) {

            if ((isset($_GET['type']) && ($value['type'] == $_GET['type'])) || ((isset($_GET['search']) && (strpos(strtolower($value['name']), strtolower($search)) !== false)))) {
                $total_count++;
                if ($key < ($page - 1) * 12) continue;
                if (($count  < ($page * 12)) && ($count < ($page * 12) + 1)) {
                    $count++;

        ?>
                    <div class="col-6 col-md-6 col-lg-4 col-xxl-3 mt-4 mb-3">
                        <form action="controller/CartController.php" method="POST">
                            <div class="card product shadow-sm">
                                <a href="product-detail.php?id=<?= $value['id'] ?>" class="text-decoration-none text-dark">
                                    <img src="<?= $value['image'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-title product-name"><?= $value['name'] ?></p>
                                        <p class="card-text fw-bold">RM <?= $value['price'] ?></p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <button id="addToCart" type="submit" name="addToCart" class="btn btn-outline-dark btn-sm fw-bold w-100">Add to Cart</button>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <button type="submit" name="buyNow" class="btn btn-dark btn-sm fw-bold w-100">Buy Now</button>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <input type="hidden" name="id" value="<?= $value['id'] ?>">
                            <input type="hidden" name="name" value="<?= $value['name'] ?>">
                            <input type="hidden" name="image" value="<?= $value['image'] ?>">
                            <input type="hidden" name="price" value="<?= $value['price'] ?>">
                            <input type="hidden" name="url" value="<?= basename($_SERVER['PHP_SELF']) . "?" . $get ?>">
                            <input type="hidden" name="qty" value="1">

                        </form>
                    </div>


        <?php
                }
            }
        }
        ?>

    </div>

    <?php

    $total_pages = ceil($total_count / $per_page);

    if ($count >= 12) { ?>

        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link text-dark" href="product-list.php?<?= $get ?>&page=<?= ($page > 1) ? $_GET['page'] - 1  :  1 ?>"><i class="bi bi-caret-left-fill"></i></a></li>

                        <?php for ($x = 1; $x <= $total_pages; $x++) {
                            if ($x == $page) {
                                $class = 'bg-dark text-light';
                            } else {
                                $class = 'text-dark';
                            } ?>

                            <li class="page-item">
                                <a class="page-link <?= $class ?>" href="product-list.php?<?= $get ?>&page=<?= $x ?>"><?= $x ?></a>
                            </li>

                        <?php
                        } ?>

                        <li class="page-item">
                            <a class="page-link text-dark" href="product-list.php?<?= $get ?>&page=<?= ($page < $total_pages) ? $page + 1 : $total_pages ?>">
                                <i class="bi bi-caret-right-fill"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    <?php }  ?>


</div>


<?php include('templates/footer.php'); ?>


<script>
    var alertList = document.querySelectorAll('.alert')
    alertList.forEach(function(alert) {
        new bootstrap.Alert(alert)
    })
</script>