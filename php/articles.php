<?php
require 'config.php';

$stmt = $pdo->query("SELECT articles.*, users.username FROM articles JOIN users ON articles.user_id = users.id ORDER BY created_at DESC");
$articles = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Статьи</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Статьи</h2>
    <?php foreach ($articles as $article): ?>
        <article>
            <h3><?php echo htmlspecialchars($article['title']); ?></h3>
            <p><?php echo htmlspecialchars($article['content']); ?></p>
            <p>Автор: <?php echo htmlspecialchars($article['username']); ?> | Дата: <?php echo $article['created_at']; ?></p>
        </article>
    <?php endforeach; ?>
    <a href="../index.html">На главную</a>
</body>
</html>