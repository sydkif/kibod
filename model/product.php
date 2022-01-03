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

        $sql = "SELECT type, name, image, price FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $product_list = array();
            foreach ($result as $product) {
                $product_list[] = $product;
            }

            return $product_list;
        } else {

            $conn->close();
            return "0 results";
        }
    }
}
