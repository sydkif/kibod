<?php

require_once('config.php');

class User
{

    function login($username, $password)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
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
        $check_sql = "SELECT username FROM user WHERE username = '$username'";
        $check_result = $conn->query($check_sql);
        $count = mysqli_num_rows($check_result);

        if ($count == 1) {
            $_SESSION['alert'] = 'danger';
            $_SESSION['message'] = 'Username <b>' . $username . '</b> is being used already.';
            $header = 'Location: ../register.php';
        } else {
            // Registering for a new account
            $sql = "INSERT INTO user(username, password, email, fname, lname, phone, address) VALUES('$username', '$password', '$email','$fname', '$lname', '$phone', '$address')";
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
                    $_SESSION['message'] = 'Email <b>' . $email . '</b> is being used already.';
                $header = 'Location: ../register.php';
            }
        }
        $conn->close();
        header($header);
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

        $sql = "UPDATE user SET password='$password', fname='$fname', lname='$lname', phone='$phone', address='$address' WHERE username='$username'";
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
