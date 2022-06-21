<?php
// session_start();

$username = $_SESSION['username'];

include_once 'vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once 'vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

$g = new \Google\Authenticator\GoogleAuthenticator();
$secret = 'XVQ2UIGO75XRUKJO';
//Optionally, you can use $g->generateSecret() to generate your secret
//$secret = $g->generateSecret();

//the "getUrl" method takes as a parameter: "username", "host" and the key "secret"
echo '<img src="' . $g->getURL($username, 'kibod.test', $secret) . '" /><br>';
echo 'or insert manually: ' . $secret;
