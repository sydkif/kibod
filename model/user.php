<?php

require_once('config.php');

class User {

    function login($username, $password) {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . $password . "'";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);                        

        if($count == 1) {
            $_SESSION['username'] = $username;
            if($username == 'admin') {                
                header("Location: admin/dashboard.php");
            } else {                
                header("Location: index.php");
            }
        } else {            
            header("Location: login.php");
        }
    }
}