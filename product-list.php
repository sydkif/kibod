<?php include('templates/header.php'); ?>


<div class="container" style="margin-top: 100px;">

    <div class="row">
        <div class="col mt-4">
            <span class="fs-2 fw-bold">Full-Sized Keyboard Collection</span>
            <hr>
        </div>
    </div>

    <div class="row">

        <?php for ($x = 0; $x < 10; $x++) { ?>

            <div class="col-12 col-md-6 col-lg-4 col-xxl-3 mt-4 mb-3">
                <a href="product-detail.php" class="text-decoration-none text-dark">
                    <div class="card product shadow-sm">
                        <img src="img/products/sample_product.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title fs-5 fw-bold">K10 RGB Backlit Blue Switch</p>
                            <p class="card-text">RM 89.00</p>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="btn btn-outline-dark fw-bold w-100">Add to Cart</a>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="btn btn-dark fw-bold w-100">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        <?php } ?>

    </div>
</div>


<?php include('templates/footer.php'); ?>