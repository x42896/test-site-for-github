<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <title>Вход</title>
</head>

<body>
  <h2>Вход в личный кабинет</h2>
  <form action="/config/login.php" method="POST">
    <label>Логин:</label><br>
    <input type="text" name="username" ><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Войти</button>
  </form>
</body>

</html>