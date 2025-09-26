<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>

<body>
    <h2>Регистрация</h2>
    <form action="/config/register.php" method="POST">
        <label>Имя пользователя:</label><br>
        <input type="text" name="user-name" required><br><br>


        <label>Email:</label><br>
        <input type="email" name="user-email" required><br><br>


        <label>Пароль:</label><br>
        <input type="password" name="user-password" required><br><br>


        <button type="submit">Зарегистрироваться</button>
    </form>
</body>
</html>