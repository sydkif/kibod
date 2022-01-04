<?php

// penoh ade error
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
}
