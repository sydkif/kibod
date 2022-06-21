<?php include('templates/header.php');

if (!isset($_SESSION['username']))
    Header('Location: login.php');


$username = $_SESSION['username'];
$password = $_SESSION['password'];
$secret = $_SESSION['secret'];

?>

<div class="container" style="margin-top: 80px;">

    <div class="row d-flex justify-content-center align-items-center py-5">

        <div class="col-12 col-md-10 col-lg-8 col-xl-6">

            <div class="card bg-white shadow-sm" style="border-radius:1rem;">

                <div class="card-body px-4">

                    <form action="controller/UserController.php" method="post" name="verify2fa">

                        <div class="mb-md-3 mt-md-3">

                            <div class="text-center">
                                <img src="img/logo.png" alt="" style="height: 160px" class="filter-gray">
                                <h3 class="fs-4 fw-bold mb-3 mt-3">Verify Authentication</h3>
                                <p class="gray-text">Enter your 6-digit code to continue</p>
                                
                                <input type="hidden" name="username" value="<?= $username ?>">
                                <input type="hidden" name="password" value="<?= $password ?>">
                                <input type="hidden" name="secret" value="<?= $secret ?>">
                            </div>

                            <label for="code" class="small-label"><b>6-DIGIT CODE</b></label>
                            <input class="bg-light mb-3 py-2 form-control" type="password" name="code" placeholder="" required>

                            <?php if (isset($_SESSION['message'])) { ?>
                                <div class="alert alert-<?= $_SESSION['alert'] ?> alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message'] ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php }
                            $_SESSION['message'] = null; ?>

                            <button type="submit" class="btn btn-secondary py-2 w-100 shadow mt-2 mb-5" style="border-radius: 0.5rem;" name="login2fa">
                                Submit</button>


                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include('templates/footer.php');

session_destroy();

?>