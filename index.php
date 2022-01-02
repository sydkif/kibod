<?php include('templates/header.php'); ?>



<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/carousel/slide_img_1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/carousel/slide_img_2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/carousel/slide_img_3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/carousel/slide_img_4.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="img/carousel/slide_img_5.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container mt-3">

    <span class="fs-4"><b>Choose you style.</b></span><br>
    <span class="fs-5">Need help choosing one?</span>
    <a class="btn btn-sm btn-dark mx-2" href="https://i.imgur.com/uW8OuLu.png"><b>Click here</b></a>
    </h3>
    <hr>

    <div class="row">

        <div class="col-12 col-lg-6 my-3">
            <a class="text-decoration-none text-muted" href="product-list.html?type=full">
                <div class="card full-row" style="height: 250px;">
                    <div class="card-header mb-3"><b>FULL SIZED</b></div>
                    <img src="img/svg/full-sized.svg" alt="full-sized-keyboard"><br>
                </div>

            </a>
        </div>

        <div class="col-12 col-lg-6 my-3">
            <a class="text-decoration-none text-muted" href="product-list.html?type=tkl">
                <div class="card full-row" style="height: 250px;">
                    <div class="card-header mb-3"><b>TENKEYLESS</b></div>
                    <img src="img/svg/tenkeyless.svg" alt="tenkeyless-keyboard"><br>
                </div>

            </a>
        </div>

        <div class="col-12 col-lg-6 my-3">
            <a class="text-decoration-none text-muted" href="product-list.html?type=75">
                <div class="card compact-row" style="height: 250px;">
                    <div class="card-header mb-3"><b>75% LAYOUT</b></div>
                    <img src="img/svg/75-layout.svg" alt="75-layout-keyboard"><br>
                </div>

            </a>
        </div>

        <div class="col-12 col-lg-6 my-3">
            <a class="text-decoration-none text-muted" href="product-list.html?type=65">
                <div class="card five-row" style="height: 250px;">
                    <div class="card-header mb-3 align-items-end"><b>65% LAYOUT</b></div>
                    <img src="img/svg/65-layout.svg" alt="65-layout-keyboard"><br>
                </div>

            </a>
        </div>

        <div class="col-12 col-lg-6 my-3">
            <a class="text-decoration-none text-muted" href="product-list.html?type=60">
                <div class="card five-row" style="height: 250px;">
                    <div class="card-header mb-3"><b>60% LAYOUT</b></div>
                    <img src="img/svg/60-layout.svg" alt="60-layout-keyboard"><br>
                </div>
            </a>
        </div>

    </div>




</div>


<?php include('templates/footer.php'); ?>