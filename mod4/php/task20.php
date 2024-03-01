<?php
$host = 'ваш_хост';
$db = 'ваша_база_данных';
$user = 'ваш_пользователь';
$pass = 'ваш_пароль';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "
        SELECT
            o.id AS order_id,
            o.user_id,
            u.username,
            o.order_time,
            o.book_id,
            b.book_title
        FROM
            ordered_books o
        JOIN
            users u ON o.user_id = u.id
        JOIN
            books b ON o.book_id = b.id;
    ";

    $stmt = $pdo->query($query);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Выводите или обрабатывайте данные по вашему усмотрению
        echo "Order ID: {$row['order_id']}, User ID: {$row['user_id']}, Username: {$row['username']}, Order Time: {$row['order_time']}, Book ID: {$row['book_id']}, Book Title: {$row['book_title']}<br>";
    }
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
