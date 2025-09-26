<?php
session_start();

// Подключение к БД
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

// Получаем данные из формы
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Валидация
if (empty($username) || empty($password)) {
    die("Заполните все поля!");
}

// Подготовленный запрос PDO
try {
    $stmt = $pdo->prepare("SELECT id, password, balance FROM users WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user) {
        // Проверяем пароль
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            $_SESSION['balance'] = $user['balance'];

            header("Location: /php/dashboard.php");
            exit();
        } else {
            echo "Неверный пароль.";
        }
    } else {
        echo "Пользователь не найден.";
    }
} catch (PDOException $e) {
    echo "Ошибка базы данных: " . $e->getMessage();
}
