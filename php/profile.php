<?php
require 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Личный кабинет</h2>
    <p>Добро пожаловать, <?php echo htmlspecialchars($user['username']); ?>!</p>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <a href="../index.html">На главную</a>
</body>
</html>