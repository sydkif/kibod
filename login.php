<?php include('templates/header.php');

if (isset($_SESSION['username']))
    Header('Location: index.php');

?>

<div class="container" style="margin-top: 80px;">

    <div class="row d-flex justify-content-center align-items-center py-5">

        <div class="col-12 col-md-10 col-lg-8 col-xl-6">

            <div class="card bg-white shadow-sm" style="border-radius:1rem;">

                <div class="card-body px-4">

                    <form action="controller/UserController.php" method="post" name="login">

                        <div class="mb-md-3 mt-md-3">

                            <div class="text-center">
                                <img src="img/logo.png" alt="" style="height: 160px" class="filter-gray">
                                <h3 class="fs-4 fw-bold mb-3 mt-3">Log In</h3>
                                <p class="gray-text">Enter your username and password below</p>
                            </div>

                            <label for="username" class="small-label mt-4"><b>USERNAME</b></label>
                            <input class="bg-light mb-3 py-2 form-control" type="text" name="username" placeholder="Username" required>

                            <label for="password" class="small-label"><b>PASSWORD</b></label>
                            <input class="bg-light mb-5 py-2 form-control" type="password" name="password" placeholder="Password" required>

                            <button type="submit" class="btn btn-secondary py-2 w-100 shadow mb-5" style="border-radius: 0.5rem;" name="login">
                                Log In</button>

                            <div class="text-center">
                                <p class="gray-text">Don't have account?<a href="register.php" class="text-decoration-none text-muted mx-1"><b>Sign up</b></a></p>
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
    
</div>

<?php include('templates/footer.php'); ?>