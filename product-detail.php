<?php

include('templates/header.php');
require_once('model/product.php');
require_once('model/cart.php');

if (isset($_GET['id'])) {
    $product = new product();
    $selected_product = $product->getProductById($_GET['id']);
} else {
    Header('Location: index.php');
}

if (isset($_POST['addToCart'])) {

    if (isset($_SESSION['username'])) {

        $userCart = new Cart();
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

        if ($existed)
            echo '<script>alert("Product already added!")</script>';
        else
            $userCart->addToCart($_SESSION['username'], $final_data);
    } else {
        Header('Location: login.php');
    }
}

if (isset($_POST['buyNow'])) {
    if (isset($_SESSION['username'])) {

        $userCart = new Cart();
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

        if ($existed)
            echo '<script>alert("Product already added!")</script>';
        else
            $userCart->addToCart($_SESSION['username'], $final_data);

            Header('Location: cart.php');
    } else {
        Header('Location: login.php');
    }
}

?>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


<div class="container" style="margin-top: 140px;">

    <a href="javascript: history.go(-1)" class="text-decoration-none fw-bold fs-4 text-dark">
        <i class="bi bi-caret-left-fill"></i>Go back</a>

    <div class="card shadow-sm mt-3">
        <form action="" method="post">
            <div class="card-body">

                <div class="row mt-1">

                    <div class="col-12 col-lg-6">
                        <img src="<?= $selected_product['image'] ?>" class="img-fluid border">
                    </div>

                    <div class="col-12 col-lg-6 d-lg-flex flex-column">

                        <p class="fs-2 fw-bold mt-3"><?= $selected_product['name'] ?></p>

                        <hr>
                        <div class="row">
                            <div class="col-6">

                                <p>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <span style="font-size:small">32 Reviews</span>
                                </p>

                                <p class="fs-3 fw-bold mt-2">RM <?= $selected_product['price'] ?>.00</p>
                                <p class="fs-6 fw-bold mt-2">QUANTITY</p>
                                <select name="qty" class="form-select w-100">
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-6 d-flex flex-column">
                                <div id="qrcode_display" class="m-auto"></div>
                                <span class="m-auto" style="font-size:small">Scan for more info</span>
                                <script type="text/javascript">
                                    var qrcode = new QRCode(document.getElementById("qrcode_display"), {
                                        text: "https://www.youtube.com/watch?v=bxqLsrlakK8",
                                        width: 150,
                                        height: 150,
                                        colorDark: "#000000",
                                        colorLight: "#ffffff",
                                        correctLevel: QRCode.CorrectLevel.H
                                    });
                                </script>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?= $selected_product['id'] ?>">
                        <input type="hidden" name="name" value="<?= $selected_product['name'] ?>">
                        <input type="hidden" name="image" value="<?= $selected_product['image'] ?>">
                        <input type="hidden" name="price" value="<?= $selected_product['price'] ?>">

                        <br>
                        <hr class="mt-auto">


                        <button type="submit" name="addToCart" class="btn btn-outline-dark fs-5 fw-bold w-100">ADD TO CART</button>
                        <button type="submit" name="buyNow" class="btn btn-dark fs-5 fw-bold w-100 my-2">BUY NOW</button>

                    </div>

                </div>


            </div>
        </form>

    </div>
    <hr>

</div>

<?php include('templates/footer.php') ?>