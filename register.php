<?php include('templates/header.php'); ?>

<div class="container" style="margin-top: 150px;">

    <div class="row d-flex justify-content-center align-items-center py-5">

        <div class="col-12 col-lg-10 col-xl-8">

            <div class="card bg-white shadow-sm" style="border-radius:1rem;">

                <div class="card-body px-4">

                    <form action="controllers/Login.php" method="post">

                        <div class="mb-md-3 mt-md-3">

                            <div class="text-center">
                                <img src="img/logo.png" alt="" style="height: 160px" class="filter-gray">
                                <h3 class="fs-4 fw-bold mb-3 mt-3">Registration</h3>
                                <p class="gray-text">Enter your account details below</p>
                            </div>

                            <div class="row mb-4 mt-5">
                                <hr>
                                <div class="col-12 col-md-6">
                                    <label for="username" class="small-label"><b>USERNAME</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="username" placeholder="Username" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="small-label"><b>EMAIL</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="email" name="email" placeholder="Email address" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="small-label"><b>PASSWORD</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="confirm_password" class="small-label"><b>CONFIRM PASSWORD</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="password" name="confirm_password" placeholder="Confirm password" required>
                                </div>
                                <hr>
                                <div class="col-12 col-md-6">
                                    <label for="fname" class="small-label"><b>FIRST NAME</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="fname" placeholder="First name" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="lname" class="small-label"><b>LAST NAME</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="lname" placeholder="Last name" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone" class="small-label"><b>PHONE NUMBER</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="phone" placeholder="Phone number" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="small-label"><b>ADDRESS</b></label>
                                    <!-- <input class="bg-light mb-3 py-2 form-control" type="text" name="address" placeholder="Address" required> -->
                                    <textarea class="bg-light mb-3 py-2 form-control" name="address" id="" rows="3"></textarea>
                                </div>

                            </div>

                            <button type='submit' class="btn btn-secondary py-2 w-100 shadow mb-5" style="border-radius: 0.5rem;">
                                Register</button>

                            <div class="text-center">
                                <p class="gray-text">Already registered? <a href="login.php" class="text-decoration-none text-muted"><b>Log in</b></a></p>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

<?php include('templates/footer.php'); ?>