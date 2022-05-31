<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo 'Администрирование: '.$_COOKIE['user']; ?></title>

  <link rel="stylesheet" href="/style/style.css">

  <script src="/scripts/script.js" defer></script>
  <script src="/scripts/validAuth.js" defer></script>
  <script src="/scripts/validRegistr.js" defer></script>
</head>
<body>
  <header>
    <div class="header_con">
      <div class="logo">
        <img src="/images/logo/logo.png" alt="Логотип">
      </div>

      <div class="sidebar">
        <div class="btn_sidebar">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div class="sidebar_main">
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

  <div class="modal">
    <div class="account">
      <button class="auth_btn modal_btn">Войти</button>
      <button class="reg_btn modal_btn">Регистрация</button>
    </div>
  </div>

  <div class="modal">
    <form class="form_auth" action="auth.php" method="POST">
      <h1>Вход</h1>
      <input class="auth_input auth_login" type="text" required placeholder="Логин" name="login">
      <input class="auth_input auth_password" type="password" required placeholder="Пароль" name="password">

      <input type="submit" class="submit_reg" value="Далее >"></input>

      <div class="error_auth"></div>
    </form>
  </div>

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

</body>
</html>