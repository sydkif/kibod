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
                header("Location: admin/dashboard.php");
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: login.php");
        }
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
            echo '<script language="javascript">';
            echo 'alert("This account already exist")';
            echo '</script>';
        } else {
            // Registering for a new account
            $sql = "INSERT INTO user(username, password, email, fname, lname, phone, address) VALUES('$username', '$password', '$email','$fname', '$lname', '$phone', '$address')";
            $result = $conn->query($sql);

            if ($result) {
                $_SESSION['username'] = $username;
                $userCart = new Cart();
                $userCart->createCart($username);
                header("Location: index.php");
            } else {
                echo '<script language="javascript">';
                echo 'alert("Fail to enter into database")';
                echo '</script>';
                header("Location: register.php");
            }
        }
        $conn->close();
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

    function setUser($username, $password, $email, $fname, $lname, $phone, $address)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE user SET password='$password', email='$email', fname='$fname', lname='$lname', phone='$phone', address='$address' WHERE username='$username'";
        $result = $conn->query($sql);
        $conn->close();
        if ($result) {
            header("Location: profile.php");
        }
    }

    function getDeliveryInfo($username)
    {
        $user = $this->getUserById($username);
        $result = "<b>" . $user['fname'] . " " . $user['lname'] . " (" . $user['phone'] . ")</b> " . $user['address'];

        return $result;
    }
}
