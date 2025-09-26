<?php
// Получаем данные из формы и удаляем лишние пробелы
$name = trim($_POST['name']);
$age = trim($_POST['age']);
$cource = trim($_POST['cource']);



// Параметры подключения к БД
$host = 'localhost';    // Обычно localhost даже на хостинге
$user = 'root';         // на локальном сервере обычно root
$password = 'root';     // пароль может быть пустым на MAMP/XAMPP
$dbname = 'school';     // Название базы данных



// Подключение к БД
$conn = new mysqli($host, $user, $password, $dbname);
// Проверка подключения
if ($conn->connect_error) {
    die('Ошибка подключения: ' . $conn->connect_error);
}

// Это защищает от SQL-инъекций, так как значения обрабатываются отдельно от структуры запроса
$sql = "INSERT INTO applications (name, age, course) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $name, $age, $course); // s - строка, i - число, s - строка

if ($stmt->execute()) {
    echo 'Спасибо, заявка отправлена!';
} else {
    echo 'Ошибка: ' . $stmt->error;
}

$stmt->close();
$conn->close();