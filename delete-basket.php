<?php
        $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

        // $user = $_COOKIE['user'];
        $idBasket = $_POST['idBasket'];

        $mysql->query("DELETE FROM `basket` WHERE `id` = '$idBasket'");

        echo json_encode(true)
?>