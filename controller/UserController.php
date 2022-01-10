<?php

session_start();

require_once('../model/user.php');
require_once('../model/cart.php');

$user = new User();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $user->register($username, $password, $email, $fname, $lname, $phone, $address);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user->login($username, $password);
}

if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $user->setUser($username, $password, $email, $fname, $lname, $phone, $address);
}
