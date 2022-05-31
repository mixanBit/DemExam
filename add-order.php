<?php
        $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

        $user = $_COOKIE['user'];
        $price = $_POST['summa'];

        $mysql->query("INSERT INTO `orders`(`user_login`, `order_price`, `status`) VALUES ('$user','$price','новый')");

        $mysql->query("DELETE FROM `basket` WHERE `user_login` = '$user'");
        echo json_encode(true);
?>