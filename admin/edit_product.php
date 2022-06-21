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
<?php

require_once('../model/product.php');

if (isset($_GET['id'])) {
    $product = new product();
    $row = $product->getProductById($_GET['id']);
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $product = new product();
    $product->updateProduct($id, $name, $type, $price, $image);
}
?>

<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
        </button>
        <div class="container-fluid">
            <a class="navbar-brand me-auto " href="#">Personal Shopper</a>
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
                    <li><a href="products.php" class="nav-link px-3 active">
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
    </div>
    <!-- Offcanvas End -->

    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 fs-1">
                    Update Product
                </div>
            </div>
            <form method="POST" name="add">
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" id="text" name="name" class="form-control" value="<?= $row['name'] ?>" />
                </div>

                <div class="form-outline mb-4">
                    <label>Type: </label>
                    <select class="form-control" name="type">
                        <option value="full" <?php if ($row['type'] == 'full') echo 'selected="selected"'; ?>>Full</option>
                        <option value="tkl" <?php if ($row['type'] == 'tkl') echo 'selected="selected"'; ?>>TKL</option>
                        <option value=75 <?php if ($row['type'] == 75) echo 'selected="selected"'; ?>>75</option>
                        <option value=65 <?php if ($row['type'] == 65) echo 'selected="selected"'; ?>>75</option>
                        <option value=60 <?php if ($row['type'] == 60) echo 'selected="selected"'; ?>>60</option>
                    </select>
                </div>

                <div class="form-outline mb-4">
                    <span class="input-group-text" id="basic-addon1">RM</span>
                    <input type="number" name="price" class="form-control" min="1" max="400" value="<?= $row['price'] ?>" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Upload Image Link</label>
                    <input type="text" id="text" name="image" class="form-control" value="<?= $row['image'] ?>" />
                </div>

                <div class="d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary" name="update">Update Product</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>