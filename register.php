<?php include('templates/header.php'); ?>

<div class="container" style="margin-top: 80px;">

    <div class="row d-flex justify-content-center align-items-center py-5">

        <div class="col-12 col-lg-10 col-xl-8">

            <div class="card bg-white shadow-sm" style="border-radius:1rem;">

                <div class="card-body px-4">

                    <form action="controller/UserController.php" method="post" name="register_form" onsubmit="return validate();">

                        <div class=" mb-md-3 mt-md-3">

                            <div class="text-center">
                                <img src="img/logo.png" alt="" style="height: 160px" class="filter-gray">
                                <h3 class="fs-4 fw-bold mb-3 mt-3">Registration</h3>
                                <p class="gray-text">Enter your account details below</p>
                            </div>

                            <div class="row mb-4 mt-5">
                                <hr>
                                <div class="col-12 col-md-6">
                                    <label for="username" class="small-label"><b>USERNAME</b></label>
                                    <input type="text" class="bg-light py-2 form-control" name="username" placeholder="Username" pattern="^\S+$" title="Must be no whitespace." required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="small-label"><b>EMAIL</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="email" placeholder="Email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="e.g. user@kibod.my" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="password" class="small-label"><b>PASSWORD</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="password" name="password" placeholder="Password" pattern=".{8,}" title="Minimum 8 or more characters" required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="confirm_password" class="small-label"><b>CONFIRM PASSWORD</b></label>
                                    <input class="bg-light mb-3 py-2 form-control" type="password" name="confirm_password" placeholder="Confirm password" pattern=".{8,}" title="Minimum 8 or more characters" required>
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
                                    <input class="bg-light mb-3 py-2 form-control" type="text" name="phone" placeholder="Phone number" pattern="^(\+?6?01)[0-46-9]-*[0-9]{7,8}$" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="small-label"><b>DELIVERY ADDRESS</b></label>
                                    <textarea class="bg-light mb-3 py-2 form-control" name="address" id="" rows="3" placeholder="Delivery address" required></textarea>
                                </div>

                            </div>

                            <button type='submit' class="btn btn-secondary py-2 w-100 shadow mb-5" style="border-radius: 0.5rem;" name="register">
                                Register</button>

                            <div class="text-center">
                                <p class="gray-text">Already registered?<a href="login.php" class="text-decoration-none text-muted mx-1"><b>Log in</b></a></p>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

<?php include('templates/footer.php'); ?>

<script>
    function validate() {
        let pass_a = document.forms['register_form']['password'].value;
        let pass_b = document.forms['register_form']['confirm_password'].value;

        if (pass_a != pass_b) {
            alert("Password does not match!");
            return false;
        }
    }
</script>