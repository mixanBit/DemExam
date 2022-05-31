<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error</title>
  <link rel="stylesheet" href="/style/exit.css">
</head>
<body>
  
<?php 
  $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

  $login = $_POST['login'];
  $password = md5($_POST['password']);

  $result = $mysql->query("SELECT * FROM `testuser` WHERE `login` = '$login' AND `password` = '$password'");

  $user = $result->fetch_assoc();

  if(isset($user) == 0){
    echo '
      <div class="window red">
      <p>Неверный логин или пароль!</p>
      <a href="index.html">Вернуться ></a>
      </div>
  ';
  } 
  else if($login == 'admin'){
    setcookie('user', $user['login'], time() + 9600, "/");
    setcookie('userId', $user['id'], time() + 9600, "/");
    header('Location: admin.php');
  }
  else{
    setcookie('user', $user['login'], time() + 9600, "/");
    setcookie('userId', $user['id'], time() + 9600, "/");
    header('Location: lk.php');
  }
?>

</body>
</html>