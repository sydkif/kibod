<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('../model/user.php');
require_once('../model/cart.php');
include_once '../vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once '../vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

$user = new User();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Storing google recaptcha response
    // in $recaptcha variable
    $recaptcha = $_POST['g-recaptcha-response'];

    // Put secret key here, which we get
    // from google console
    $secret_key = '6LffioQgAAAAAClET4BVaEkwxMsWTjwmYlO7kY9f';

    // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $recaptcha;

    // Making request to verify captcha
    $response = file_get_contents($url);

    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);

    // Checking, if response is true or not
    if ($response->success == true) {
        // echo '<script>alert("Google reCAPTACHA verified")</script>';
        $user->register($username, $password, $email, $fname, $lname, $phone, $address);
    } else {
        echo '<script>alert("Error in Google reCAPTACHA")</script>';
        echo '<script>history.back()</script>';
    }
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user->login($username, $password);
}

if (isset($_POST['login2fa'])) {

    $g = new \Google\Authenticator\GoogleAuthenticator();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $secret = $_POST['secret'];
    $code = $_POST['code'];

    if ($g->checkCode($secret, $code)) {
        echo "<script>alert('Authorized!')</script>";
        $user->login2fa($username, $password);
    } else {
        echo "<script>alert('Incorrect or expired code!')</script>";
        echo "<script>history.back()</script>";
    }
}

if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $user->setUser($username, $password, $fname, $lname, $phone, $address);
}

if (isset($_POST['disable_2fa'])) {

    $g = new \Google\Authenticator\GoogleAuthenticator();

    $username = $_POST['username'];
    $secret = $_POST['secret_key'];
    $code = $_POST['code'];

    if ($g->checkCode($secret, $code)) {
        echo "<script>alert('Authorized!')</script>";
        $user->disable2fa($username);
    } else {
        echo "<script>alert('Incorrect or expired code!')</script>";
        echo "<script>history.back()</script>";
    }
}
