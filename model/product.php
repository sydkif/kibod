<?php

require_once('config.php');

class product
{

    function getProductList()
    {

        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, type, name, image, price FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $product_list = array();
            foreach ($result as $product) {
                $product_list[] = $product;
            }
            $conn->close();
            return $product_list;
        } else {

            $conn->close();
            return "0 results";
        }
    }

    function getProductById($id)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM product WHERE id = '" . $id . "'";
        $result = $conn->query($sql)->fetch_array();

        $conn->close();
        return $result;
    }

    function countProduct() {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(id) FROM product";
        $result = $conn->query($sql);
        $row = $result->fetch_array();

        $conn->close();
        return $row;
    }

    function addProduct($name, $type, $price) {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $now = date('Y-m-d H:i:s');

        $sql = "INSERT INTO product(type, name, image, price, date_created, date_update) VALUES ('$type', '$name', NULL, '$price', '$now', '$now')";
        $result = $conn->query($sql);

        if($result) {
            header("Location: products.php");
        }

        $conn->close();        
    }

    function removeProduct($id){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM product WHERE id='$id'";
        $result = $conn->query($sql);

        if($result) {
            header("Location: products.php");
        }

        $conn->close();
    }

    function updateProduct($id, $name, $type, $price){
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE product SET name='$name', type='$type', price='$price', date_update='$now' WHERE id='$id'";
        $result = $conn->query($sql);
 
        if($result) {
            header("Location: products.php");
        }
    }

    // This is not important and used for admin dashboard because i dont know what else to put
    function getThreeProduct() {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT name FROM product WHERE ID IN(25, 31, 38, 17, 37)";
        $result = $conn->query($sql);


        $conn->close();
        return $result;
    }
}
