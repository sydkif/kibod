<?php

include('templates/header.php');
require_once('model/user.php');

if (!isset($_SESSION['username']))
    Header('Location: index.php');

// Get user profile by id
$user = new User();
$row = $user->getUserById($_SESSION['username']);


?>

<div class="container" style="margin-top: 150px;">

    <div class="row d-flex justify-content-center align-items-center py-5">

        <div class="col-12 col-lg-10 col-xl-8">

            <div class="card bg-white shadow-sm" style="border-radius:1rem;">

                <div class="card-body px-4">

                    <form action="controller/UserController.php" method="post" name="update">

                        <div class="mb-md-3 mt-md-3">

                            <div class="text-center">
                                <img src="img/logo.png" alt="" style="height: 160px" class="filter-gray">
                                <h3 class="fs-4 fw-bold mb-3 mt-3">Profile</h3>
                                <p class="gray-text">Account Details</p>
                            </div>

                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-<?= $_SESSION['alert'] ?> alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message'] ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php }
                            $_SESSION['message'] = null; ?>

                            <div class="row mb-4 mt-5">
                                <hr>
                                <div class="col-12 col-md-6">
                                    <label for="username" class="small-label"><b>USERNAME</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="username" placeholder="Username" value="<?= $row['username']; ?>" disabled>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="small-label"><b>EMAIL</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="email" name="email" placeholder="Email address" value="<?= $row['email']; ?>" disabled>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="small-label"><b>PASSWORD</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="password" name="password" placeholder="Password" value="<?= $row['password']; ?>" pattern=".{8,}" title="Minimum 8 or more characters" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="confirm_password" class="small-label"><b>CONFIRM PASSWORD</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="password" name="confirm_password" value="<?= $row['password']; ?>" pattern=".{8,}" title="Minimum 8 or more characters" required>
                                </div>
                                <hr>
                                <div class="col-12 col-md-6">
                                    <label for="fname" class="small-label"><b>FIRST NAME</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="fname" placeholder="First name" value="<?= $row['fname']; ?>" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="lname" class="small-label"><b>LAST NAME</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="lname" placeholder="Last name" value="<?= $row['lname']; ?>" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="small-label"><b>PHONE NUMBER</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="phone" placeholder="Phone number" value="<?= $row['phone']; ?>" pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="small-label"><b>ADDRESS</b></label>
                                    <textarea class="bg-light mb-3 py-2 form-control" name="address" id="" rows="3" required> <?= $row['address']; ?></textarea>
                                </div>
                            </div>

                            <button type='submit' class="btn btn-secondary py-2 w-100 shadow mb-2" style="border-radius: 0.5rem;" name="update">
                                Update</button>

                        </div>
                    </form>
                    <a href="history.php">
                        <button class="btn btn-primary py-2 w-100 shadow mb-4" style="border-radius: 0.5rem;">
                            Purchase History</button>
                    </a>

                    <?php

                    if ($row['secret_key'] == NULL || $row['secret_key'] == '') {

                    ?>

                        <button class="btn btn-dark py-2 w-100 shadow mb-4" style="border-radius: 0.5rem;" data-bs-toggle="modal" data-bs-target="#enable_2fa">Enable Two-Factor Auth</button>
                        <form action="check.php" method="post">
                            <div id="enable_2fa" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">Enable Two Factor Auth</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>1. Download Google Authenticator for your phone or tablet</p>
                                            <p>2. Scan the QR Code</p>
                                            <?php

                                            $username = $_SESSION['username'];

                                            include_once 'vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
                                            include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
                                            include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
                                            include_once 'vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

                                            $g = new \Google\Authenticator\GoogleAuthenticator();
                                            // $secret = 'XVQ2UIGO75XRUKJO';
                                            //Optionally, you can use $g->generateSecret() to generate your secret
                                            $secret = $g->generateSecret();

                                            //the "getUrl" method takes as a parameter: "username", "host" and the key "secret"
                                            echo '<img src="' . $g->getURL($username, 'kibod.test', $secret) . '" /><br><br>';
                                            echo 'or insert manually:<br>' . $secret;

                                            ?>
                                            <hr>
                                            <p>Enter your 6-Digit Code</p>

                                            <input class="form-control" type="text" name="code">
                                            <input type="hidden" name="secret_key" value="<?= $secret ?>">
                                            <input type="hidden" name="username" value="<?= $row['username']; ?>">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="activate_2fa" class="btn btn-primary">Activate</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    <?php } else { ?>

                        <button class="btn btn-dark py-2 w-100 shadow mb-4" style="border-radius: 0.5rem;" data-bs-toggle="modal" data-bs-target="#disable_2fa">Disable Two-Factor Auth</button>
                        <form action="controller/UserController.php" method="post">
                            <div id="disable_2fa" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">Disable Two Factor Auth</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Enter your 6-Digit Code</p>

                                            <input class="form-control" type="text" name="code">
                                            <input type="hidden" name="secret_key" value="<?= $row['secret_key'] ?>">
                                            <input type="hidden" name="username" value="<?= $row['username']; ?>">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="disable_2fa" class="btn btn-danger">Disable</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    <?php  } ?>

                    <a href="logout.php">
                        <button type='submit' class="btn btn-danger py-2 w-100 shadow mb-5" style="border-radius: 0.5rem;">
                            Logout</button>
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

<?php include('templates/footer.php'); ?>