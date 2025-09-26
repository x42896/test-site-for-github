<?php
// Подключение к БД
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

// Проверяем, что форма отправлена методом POST (защита от прямого доступа к скрипту)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Получаем данные из формы и удаляем лишние пробелы по краям
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $course = trim($_POST['course']);

    // Валидация данных: проверяем, что все поля заполнены
    if (empty($name) || empty($age) || empty($course)) {
        die("Все поля обязательны для заполнения");
    }

    // Проверяем, что возраст является числом и в допустимом диапазоне
    if (!is_numeric($age) || $age < 0 || $age > 150) {
        die("Некорректный возраст");
    }

    // SQL-запрос с именованными плейсхолдерами (защита от SQL-инъекций)
    $sql = "INSERT INTO applications (name, age, course) 
            VALUES (:name, :age, :course)";

    try {
        // Подготовка запроса с PDO - сервер заранее анализирует структуру запроса
        $stmt = $pdo->prepare($sql);
        
        // Привязка параметров с указанием типов данных:
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);   // строка
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);     // целое число
        $stmt->bindParam(':course', $course, PDO::PARAM_STR); // строка

        // Выполнение подготовленного запроса с привязанными параметрами
        if ($stmt->execute()) {
            echo "Спасибо, заявка отправлена!";
        } else {
            echo "Ошибка при отправке заявки";
        }
        
    } catch (PDOException $e) {
        // Ловим исключения PDO (ошибки базы данных)
        echo "Ошибка базы данных: " . $e->getMessage();
    }
} else {
    // Если скрипт вызван не методом POST
    echo "Неверный метод запроса";
}
?>