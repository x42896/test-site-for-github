<!-- ––––––––––––––––––––––––––––––––––––––––––––––– -->
<!-- Подключение к базе данных, этот файл как пример -->
<!-- ––––––––––––––––––––––––––––––––––––––––––––––– -->

<?php
$db_host = 'localhost'; // Оставьте localhost если используете MAMP
$db_user = 'test_user'; // Замените на имя пользователя базы данных, если работаете через MAMP напишите root
$db_pass = 'your_password'; // Замените пароль, если работаете через MAMP напишите root
$db_name = 'test_site_db'; // Замените на имя базы данных которую создали в MAMP

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}