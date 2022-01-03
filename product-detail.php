<?php include('templates/header.php') ?>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


<div class="container" style="margin-top: 140px;">

    <a href="javascript: history.go(-1)" class="text-decoration-none fw-bold fs-4 text-dark">
        <i class="bi bi-caret-left-fill"></i>Go back</a>

    <div class="row mt-3">

        <div class="col-12 col-lg-6">
            <img src="img/products/sample_product.jpg" class="img-fluid border">
        </div>

        <div class="col-12 col-lg-6 d-lg-flex flex-column">

            <p class="fs-2 fw-bold mt-3">K10 RGB Backlit Blue Switch</p>

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

                    <p class="fs-3 fw-bold mt-2">RM 89.00</p>
                    <p class="fs-6 fw-bold mt-2">QUANTITY</p>
                    <select class="form-select w-100">
                        <option selected>Select quantity</option>
                        <option value="1">1</option>
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




            <br>
            <hr class="mt-auto">

            <button class="btn btn-outline-dark fs-5 fw-bold w-100">ADD TO CART</button>
            <button class="btn btn-dark fs-5 fw-bold w-100 my-2">BUY NOW</button>

        </div>

    </div>
    <hr>
    <div class="row">

        <div class="col-12 col-lg-6">

        

        </div>

    </div>

</div>

</div>

<?php include('templates/footer.php') ?>