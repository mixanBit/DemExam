<?php 
  $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

  $login = $_POST['login'];

  $result = $mysql->query("SELECT * FROM `testuser` WHERE `login` = '$login'");

  if($result->num_rows > 0){
    $response = 'error';
  } else{
    $response = 'ok';
  }
  echo json_encode($response);
?>