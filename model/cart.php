<?php

require_once('config.php');

class Cart
{
    public function addToCart($username, $item)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($this->isEmpty($username)) {
            $sql = "UPDATE cart  SET product = '[$item]' WHERE username = '$username'";
        } else {
            $current = $this->getUserCart($username);
            $currentDecoded = json_decode($current);
            $itemDecoded = json_decode($item);

            array_push($currentDecoded, $itemDecoded);
            // print_r(json_encode($currentDecoded));
            $sql = "UPDATE cart  SET product = '" . json_encode($currentDecoded) . "' WHERE username = '$username'";
        }

        if ($conn->query($sql) === true) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    public function getUserCart($username)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM cart WHERE username = '$username'";
        $result = $conn->query($sql)->fetch_array();

        $conn->close();
        return $result[2];
    }

    public function updateUserCart($username, $cart)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE cart SET product = '$cart' WHERE username = '$username'";
        $conn->query($sql);
        $conn->close();
    }

    public function isEmpty($username)
    {

        $cart = $this->getUserCart($username);
        if ($cart == '[]')
            $result = true;
        else
            $result = false;

        return $result;
    }

    public function productExisted($username, $id)
    {
        $cart = $this->getUserCart($username);
        $cartDecoded = json_decode($cart);
        $x = 0;
        $result = false;

        foreach ($cartDecoded as $item) {
            if (key($cartDecoded[$x++]) == $id)
                $result = true;
        }

        return $result;
    }
}
