<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo 'Личный кабинет: '.$_COOKIE['user']; ?></title>

  <link rel="stylesheet" href="/style/style.css">
  <link rel="stylesheet" href="/style/bask.css">

  <!-- Общий скрипт -->
  <script src="/scripts/script.js" defer></script>

  <!-- Валидация авторизации -->
  <script src="/scripts/validAuth.js" defer></script>

  <!-- Валидация регистрации -->
  <script src="/scripts/validRegistr.js" defer></script>

  <!-- Корзина -->
  <script src="/scripts/basket.js" defer></script>
</head>

<body>
  <header>
    <div class="header_con">
      <div class="logo">
        <img src="/images/logo/logo.png" alt="Логотип">
      </div>
      
      <h2><?php echo $_COOKIE['user']; ?></h2>

      <div class="sidebar">
        <div class="btn_sidebar">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div class="sidebar_main">
          <button class="lk modal_btn">
            Корзина
          </button>
          <button class="lk modal_btn">
            Личный кабинет
          </button>
          <form action="exit.php" method="POST">
            <button class="exit_btn">Выйти</button>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Корзина -->
  <div class="modal">
    <div class="basket">
      <div class="basket_con">
        <div class="basket_menu">
          <h2>Корзина</h2>
          <h2 class="basket_summa"></h2>
        </div>
      <?php
        $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

        $user = $_COOKIE['user'];

        $basketTable = $mysql->query("SELECT * FROM `basket` where `user_login` = '$user' order by `date` desc");

        while($basket = $basketTable->fetch_assoc()){
          echo '
            <hr>
            <div class="basket_box">
              <h3>'.$basket['title'].'</h3>
              <p class="basket_price">'.$basket['price'].'</p>
              <p class="id_idBasket" style="display: none;">'.$basket['id'].'</p>
              <button class="delete_product">Удалить</button>
            </div>
          ';
        }
      ?>
      <button class="btn_order">оформить</button>
      </div>
    </div>
  </div>

  <!-- Выбор регистрации или авторизации -->
  <div class="modal">
    <div class="account">
      <button class="auth_btn modal_btn">Войти</button>
      <button class="reg_btn modal_btn">Регистрация</button>
    </div>
  </div>

  <!-- Авторизация -->
  <div class="modal">
    <form class="form_auth" action="auth.php" method="POST">
      <h1>Авторизация</h1>
      <input class="auth_input auth_login" type="text" required placeholder="Логин" name="login">
      <input class="auth_input auth_password" type="password" required placeholder="Пароль" name="password">

      <input type="submit" class="submit_reg" value="Далее >"></input>

      <div class="error_auth"></div>
    </form>
  </div>

  
  <!-- Регистрация -->
  <div class="modal">
    <form class="form_reg" action="register.php" method="POST">
      <h1>Регистрация</h1>
      <input class="reg_input" type="text" required placeholder="ФИО" name="user">
      <input class="reg_input reg_login" type="text" required placeholder="Логин" name="login">
      <input class="reg_input" type="email" required placeholder="Email" name="email">
      <input class="reg_input reg_password" type="password" required placeholder="Пароль" name="password">
      <input class="reg_input reg_topassword" type="password" required placeholder="Повтор">
      <label class="pd"><input type="checkbox" class="pd_input"><p>Соглашение</p></label>

      <input type="submit" class="submit_reg" value="Далее >"></input>

      <div class="error"></div>
    </form>
  </div>

  <!-- Каталог товаров -->
  <div class="catalog_con">
    <?php 
      $mysql = new mysqli('127.0.0.1', 'root', '', 'test');

      $result = $mysql->query('SELECT * FROM `products` ORDER BY date DESC');
      
      while($tovar = $result->fetch_assoc()){
        echo '
        <div class="catalog_box">
          <h2 class="title">'.$tovar['title'].'</h2>
          <img src="/images/'.$tovar['img'].'" alt="">
          <p>'.$tovar['content'].'</p>
          <div class="price_con">
            <p>Цена: </p>
            <p class="price">'.$tovar['price'].'</p>
          </div>
          <p style="display: none;" class="user">'.$user.'</p>
          <p style="display: none;" class="id_product">'.$tovar['id'].'</p>
          <button class="buy">Купить</button>
        </div>
        ';
      }
    ?>
  </div>


</body>
</html>