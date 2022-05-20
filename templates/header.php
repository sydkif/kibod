<?php

session_start();

require_once('model/cart.php');

$userCart = new Cart();
$totalQty = '';

if (isset($_SESSION['username']))
    $totalQty = $userCart->getTotalQty($_SESSION['username']);

if (isset($_GET['type']))
    $type = $_GET['type'];
else
    $type = '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="manifest" href="manifest.json">

    <title>KIBOD&trade;</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container-fluid">
            <a href="index.php"><img class="logo" src="img/logo.png" alt="" srcset=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-3" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <hr>
                    <li class="nav-item mx-1">
                        <a class="nav-link 
                        <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo "active" ?>" href="index.php">HOME</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link 
                        <?php if ($type == 'full') echo "active" ?>" href="product-list.php?type=full">FULL SIZED</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link 
                        <?php if ($type == 'tkl') echo "active" ?>" href="product-list.php?type=tkl">TENKEYLESS</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link 
                        <?php if ($type == 75) echo "active" ?>" href="product-list.php?type=75">75% LAYOUT</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link 
                        <?php if ($type == 65) echo "active" ?>" href="product-list.php?type=65">65% LAYOUT</a>
                    </li>

                    <li class="nav-item mx-1">
                        <a class="nav-link 
                        <?php if ($type == 60) echo "active" ?>" href="product-list.php?type=60">60% LAYOUT</a>
                    </li>
                    <hr>
                    <li class="nav-item mx-1">
                        <form action="product-list.php" class="d-flex" style="height:36px">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                            <button class="btn btn-sm btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </li>
                </ul>
                <hr>
                <?php
                if (isset($_SESSION['username'])) {  ?>

                    <a class="nav-link text-decoration-none text-dark <?php if (basename($_SERVER['PHP_SELF']) == 'cart.php') echo "active" ?>" href="cart.php">
                        CART <span id="totalQty" class="translate-middle-y badge rounded-pill bg-dark"><?= $totalQty ?></span></a>

                    <a class="nav-link text-decoration-none text-dark" href="profile.php">PROFILE</a>

                <?php

                } else {
                    echo '<a class="nav-link text-decoration-none text-dark" href="login.php">LOGIN</a>';
                }
                ?>
                <br>
            </div>
        </div>
    </nav>

    <!--  -->