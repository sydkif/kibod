<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
        </button>
        <div class="container-fluid">
            <a class="navbar-brand me-auto " href="#">KIBOD</a>
        </div>
    </nav>
    <!-- Top Navbar End -->

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav my-3">
                    <li><a href="dashboard.php" class="nav-link px-3">
                            <span class="me-3">
                                <i class="bi bi-house"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider">
                    </li>
                    <li><a href="products.php" class="nav-link px-3">
                            <span class="me-3">
                                <i class="bi bi-cart"></i>
                            </span>
                            <span>Manage Product</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider">
                    </li>
                    <li><a href="history.php" class="nav-link px-3 active">
                            <span class="me-3">
                                <i class="bi bi-cart"></i>
                            </span>
                            <span>Purchase History</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider">
                    </li>
                    <li><a href="../logout.php" class="nav-link px-3">
                            <span class="me-3">
                                <i class="bi bi-box-arrow-left"></i>
                            </span>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Offcanvas End -->

    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fs-1">
                    Purchase History
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="product_table" class="table table-stripped table-bordered">
                            <thead>
                                <tr>
                                    <td>Num</td>
                                    <td>Order ID</td>
                                    <td>Username</td>
                                    <td>Product</td>
                                    <td>Total</td>                                    
                                </tr>
                            </thead>
                            <?php

                            require_once("../model/user.php");
                            $user = new User();
                            $history = $user->getAllPurchase();
                            $num = 0;
                            foreach ($history as $purchase) {
                            $product = json_decode($purchase['products'], true);
                            
                            foreach ($product as $product_id) {
                                
                                foreach ($product_id as $item) {
                                    ++$num;
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?= $num; ?></td>
                                        <td><?= $purchase['order_id']; ?></td>
                                        <td><?= $purchase['username']; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= $item['price']; ?></td>                                        
                                    </tr>
                                <?php
                                    }
                                }
                            }
                                ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>