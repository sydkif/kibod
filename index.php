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

        <?php

        $category = array(
            array('FULL SIZED', 'full', 'full-sized.svg', 'Most likely same layout you currently have.'),
            array('TENKEYLESS', 'tkl', 'tenkeyless.svg', 'All your keys you need minus a number pad.'),
            array('75% LAYOUT', '75', '75-layout.svg', 'Most compact space possible. Arrows included.'),
            array('65% LAYOUT', '65', '65-layout.svg', 'Missing function keys but arrow keys are here.'),
            array('60% LAYOUT', '60', '60-layout.svg', 'Need to use layers in order to use missing keys.')
        );

        foreach ($category as $x) { ?>


            <div class="col-12 col-xl-6 my-3">
                <a class="text-decoration-none text-muted" href="product-list.php?type=<?= $x[1] ?>">
                    <div class="card full-row shadow">
                        <div class="card-header fw-bold"><?= $x[0] ?></div>
                        <div class="card-body-custom">
                            <img src="img/svg/<?= $x[2] ?>" alt="full-sized-keyboard">
                        </div>
                        <div class="card-footer">
                            <span><?= $x[3] ?></span>
                        </div>
                    </div>
                </a>
            </div>

        <?php  } ?>

    </div>

</div>


<?php include('templates/footer.php'); ?>