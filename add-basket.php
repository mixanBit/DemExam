<?php
        $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

        $user = $_COOKIE['user'];
        $idProduct = $_POST['idProduct'];
        $title = $_POST['title'];
        $price = $_POST['price'];

        $mysql->query("INSERT INTO `basket`(`id_product`, `user_login`, `title`, `price`) VALUES ('$idProduct','$user','$title', '$price')");

        echo json_encode(true);
?>