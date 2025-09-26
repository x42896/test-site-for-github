<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login-page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Личный кабинет</title>
</head>
<body>
  <h2>Добро пожаловать, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
  <p>Ваш баланс: <?php echo $_SESSION['balance']; ?> бонусов</p>

  <a href="/config/logout.php">Выйти</a>
</body>
</html>
