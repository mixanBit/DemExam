<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Успешная регистрация</title>
  <link rel="stylesheet" href="/style/exit.css">
</head>
<body>
  


<?php 
  $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

  $user = $_POST['user'];
  $login = $_POST['login'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);

  echo '
  <div class="window">
  <p>Успешная регистрация!</p>
  <a href="index.php">Вернуться ></a>
  </div>
  ';

  $mysql->query("INSERT INTO `testuser`(`user`, `login`, `email`, `password`) VALUES ('$user','$login','$email','$password')");
?>


</body>
</html>