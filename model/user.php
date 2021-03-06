<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('config.php');

class User
{

    function login($username, $password)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Verifying hashed password
        $sql_password = "SELECT * FROM user WHERE username = '" . $username . "'";
        $result = $conn->query($sql_password)->fetch_row();
        $verify = password_verify($password, $result[1]);

        $sql = "SELECT * FROM user WHERE username = '" . $username . "'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        if ($count == 1 && $verify) {
            $_SESSION['username'] = $username;

            $secret = $this->getSecretKey($username);

            if ($secret != NULL || $secret != '') {
                $_SESSION['password'] = $password;
                $_SESSION['secret'] = $secret;
                header('Location: ../verify2fa.php');
                die();
            }

            if ($username == 'admin') {
                $header = 'Location: ../admin/dashboard.php';
            } else {
                $header = 'Location: ../index.php';
            }
        } else {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Invalid username or password!';
            $header = 'Location: ../login.php';
        }
        $conn->close();
        header($header);
    }

    function login2fa($username, $password)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Verifying hashed password
        $sql_password = "SELECT * FROM user WHERE username = '" . $username . "'";
        $result = $conn->query($sql_password)->fetch_row();
        $verify = password_verify($password, $result[1]);

        $sql = "SELECT * FROM user WHERE username = '" . $username . "'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        if ($count == 1 && $verify) {
            $_SESSION['username'] = $username;

            if ($username == 'admin') {
                $header = 'Location: ../admin/dashboard.php';
            } else {
                $header = 'Location: ../index.php';
            }
        } else {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Invalid username or password!';
            $header = 'Location: ../login.php';
        }
        $conn->close();
        header($header);
    }

    function register($username, $password, $email, $fname, $lname, $phone, $address)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        // Checking if account has already exist
        $check_username = "SELECT username FROM user WHERE username = '$username'";
        $check_username_result = $conn->query($check_username);
        $username_result = mysqli_num_rows($check_username_result);

        // Checking if email has already exist
        $check_email = "SELECT email FROM user WHERE email = '$email'";
        $check_email_result = $conn->query($check_email);
        $email_result = mysqli_num_rows($check_email_result);

        // Hashing password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if ($username_result == 1) {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Username <b>' . $username . '</b> is being used already.';
            // $header = 'Location: ../register.php';
            echo '<script>history.back()</script>';
            die();
        } else if ($email_result == 1) {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Email <b>' . $email . '</b> is being used already.';
            // $header = 'Location: ../register.php';
            echo '<script>history.back()</script>';
            die();
        } else {
            // Registering for a new account
            $sql = "INSERT INTO user(username, password, email, fname, lname, phone, address) VALUES('$username', '$hash', '$email','$fname', '$lname', '$phone', '$address')";
            $result = $conn->query($sql);

            if ($result) {
                // $_SESSION['username'] = $username;
                $userCart = new Cart();
                $userCart->createCart($username);
                $_SESSION['alert'] = 'success';
                $_SESSION['message'] = 'Registration successful, you can <b>log in</b> now.';
                $header = 'Location: ../login.php';
            } else {
                $_SESSION['alert'] = 'danger';
                $_SESSION['message'] = 'Something is wrong. Error code: ' . $conn->errno . '<br> Error message: ' . $conn->error;
                if ($conn->errno == '1062')

                    $header = 'Location: ../register.php';
            }
        }
        $conn->close();
        header($header);
    }

    function enable2FA($username, $secret_key)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE user SET secret_key = '$secret_key' WHERE username= '$username'";
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['alert'] = 'success';
            $_SESSION['message'] = 'Authentication Successful.';
            // $header = 'Location: ../profile.php';
        } else {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Something is wrong. Error code: ' . $conn->errno . '<br> Error message: ' . $conn->error;
            // $header = 'Location: ../profile.php';
        }
        $conn->close();
        header('Location: ../profile.php');
    }

    function disable2fa($username)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE user SET secret_key = '' WHERE username= '$username'";
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['alert'] = 'success';
            $_SESSION['message'] = '2FA has been disabled.';
            // $header = 'Location: ../profile.php';
        } else {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Something is wrong. Error code: ' . $conn->errno . '<br> Error message: ' . $conn->error;
            // $header = 'Location: ../profile.php';
        }
        $conn->close();
        header('Location: ../profile.php');
    }

    function getSecretKey($username)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT secret_key FROM user WHERE username = '$username' LIMIT 0,1";
        $result = $conn->query($sql);
        $row = $result->fetch_array();

        return $row['secret_key'];
    }


    function countUser()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(username) FROM user";
        $result = $conn->query($sql);
        $row = $result->fetch_array();

        $conn->close();
        return $row;
    }

    function getUserById($username)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($sql)->fetch_array();

        $conn->close();
        return $result;
    }

    function setUser($username, $password, $fname, $lname, $phone, $address)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Hashing password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET password='$hash', fname='$fname', lname='$lname', phone='$phone', address='$address' WHERE username='$username'";
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['alert'] = 'success';
            $_SESSION['message'] = 'Update successful.';
            $header = 'Location: ../profile.php';
        } else {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Something is wrong. Error code: ' . $conn->errno . '<br> Error message: ' . $conn->error;
            $header = 'Location: ../profile.php';
        }
        $conn->close();
        header($header);
    }

    function getDeliveryInfo($username)
    {
        $user = $this->getUserById($username);
        $result = "<b>" . $user['fname'] . " " . $user['lname'] . " (" . $user['phone'] . ")</b> " . $user['address'];

        return $result;
    }

    function getPurchaseHistory($username)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM order_history WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $order_list = array();
            foreach ($result as $order) {
                $order_list[] = $order;
            }
            $conn->close();
            return $order_list;
        } else {

            $conn->close();
            return "0 results";
        }
    }

    function getAllPurchase()
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM order_history";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $order_list = array();
            foreach ($result as $order) {
                $order_list[] = $order;
            }
            $conn->close();
            return $order_list;
        } else {

            $conn->close();
            return "0 results";
        }
    }
}
