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


?>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


<div class="container" style="margin-top: 140px;">

    <a href="product-list.php?type=<?= $selected_product['type'] ?>" class="text-decoration-none fw-bold fs-4 text-dark">
        <i class="bi bi-caret-left-fill"></i>Go back</a>
    <hr>

    <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-<?= $_SESSION['alert'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['msg'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php }
    $_SESSION['msg'] = null; ?>

    <div class="card shadow-sm mt-3">
        <form action="controller/CartController.php" method="post">
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
                        <input type="hidden" name="url" value="<?= basename($_SERVER['PHP_SELF']) . "?id=" . $selected_product['id'] ?>">

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

    <div class="row">
        <div class="col-12 col-lg-6">
            <p class="fw-bold">SPECIFICATION</p>
            <p>Number of Keys: 61 keys <br>
                Number of Multimedia Keys: 12 Frame Material: ABS / ABS+Aluminum bezels <br>
                Keycap Material: ABS <br>
                Keycap Profile: OEM <br>
                Layout: ANSI <br>
                Version: Gateron Mechanical / Optical / Keychron Mechanical / Hot-swappable <br>
                Switches: Gateron Mechanical / Keychron Optical / Keychron Mechanical <br>
                *Socket of Keychron Non-backlit (Hot-swappable) and Gateron (Hot-swappable) are compatible with
                almost
                all the MX style 3-pin and 5-pin mechanical switches on the market (including Gateron, Cherry,
                Kailh,
                etc.).</p>
        </div>

        <div class="col-12 col-lg-6">
            <p class="fw-bold">CONNECTIVITY AND POWER</p>
            <p>
                Backlit Types: 18 (Exclude Non-Backlit version)<br>
                Backlit: Adjustable 4-level RGB backlit (Exclude Non-Backlit version)<br>
                System: Windows/Android/Mac/iOS<br>
                Battery: 4000mAh Rechargeable li-polymer battery<br>
                BT Working Time (Non-Backlit version): Up to 570 hours (Lab test result may lety by actual use)<br>
                BT Working Time (Backlit off): Up to 240 hours (Lab test result may lety by actual use)<br>
                BT Working Time (White backlit): Up to 68 hours (Lab test result may lety by actual use)<br>
                BT Working Time (RGB backlit): Up to 72 hours (Lab test result may lety by actual use)<br>
                Connection: Bluetooth and Type-C cable<br>
                Bluetooth version: 5.1<br>
                Bluetooth Device Name: Keychron K12<br>
            </p>
        </div>

        <div class="col-12 col-lg-6">
            <p class="fw-bold">PHYSICAL UNIT</p>
            <p>Dimension (Plastic frame version): 293 x 102mm<br>
                Weight: About 536g / 1.18lbs<br>
                Dimension (Aluminum bezels version): 298 x 107mm<br>
                Height without keycap (front) 24mm<br>
                Height without keycap (rear) 30mm<br>
                Weight: About 664g / 1.46lbs<br>
                Operating Environment: -10 to 50℃<br>
            </p>
        </div>

        <div class="col-12 col-lg-6">
            <p class="fw-bold">PACKAGE CONTENT</p>
            <p>1 x Keyboard<br>
                1 x USB-C to USB Type-C Cable<br>
                1 x Keycap Puller<br>
                1 x User Manual<br>
            </p>
        </div>
    </div>
    <hr>

</div>

<?php include('templates/footer.php') ?>