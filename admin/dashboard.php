<?php

require_once("../model/product.php");
$product = new product();
$countProduct = $product->countProduct();

require_once("../model/user.php");
$user = new User();
$countUser = $user->countUser();
$chart = $user->getAllPurchase();

?>
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
            <a class="navbar-brand me-auto " href="#">Kibod</a>
        </div>
    </nav>
    <!-- Top Navbar End -->

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav my-3">
                    <li><a href="dashboard.php" class="nav-link px-3 active">
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
                    <li><a href="history.php" class="nav-link px-3">
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
                    Dashboard
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        No. of Product</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countProduct[0]; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-cash" style="font-size: 2rem; color: cornflowerblue;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Number of Users </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countUser[0]; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-cash" style="font-size: 2rem; color: green;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        No. Items Sold</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countProduct[0]; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-cart-check" style="font-size: 2rem; color: red"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        No. Registered Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $countUser[0]; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="bi bi-person-workspace" style="font-size: 2rem; color: teal;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            Pretend important chart exists here
                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" class="chart" width="400" height="200"></canvas>
                            
                        </div>
                    </div>
                </div> -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Our Top Choices
                        </div>
                        <div class="card-body">                        
                            <table class="table table-borderless">
                            <?php 
                                require_once("../model/product.php");
                                $product = new product();
                                $result = $product->getThreeProduct();
                                $num=0;
                                foreach($result as $row) {                                
                            ?>
                                <tbody>
                                    <tr>
                                        <td scope="row"><?= $num+1; ?></td>
                                        <td><?= $row['name']; ?></td>
                                    </tr>
                                </tbody>
                            <?php 
                            $num++;    
                        }
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </main>
    <script type="text/javascript" src="js/chart.min.js"></script>    
</body>

</html>