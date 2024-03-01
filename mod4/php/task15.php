<?php

$servername = "ваш_хост";
$username = "ваше_имя_пользователя";
$password = "ваш_пароль";
$dbname = "ваша_база_данных";

// Создаем соединение с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Создаем таблицу books
$sql_books = "CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author_name VARCHAR(255) NOT NULL
)";

if ($conn->query($sql_books) === TRUE) {
    echo "Table 'books' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Создаем таблицу library_members
$sql_library_members = "CREATE TABLE IF NOT EXISTS library_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    join_date DATE NOT NULL
)";

if ($conn->query($sql_library_members) === TRUE) {
    echo "Table 'library_members' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Создаем таблицу book_library_member (промежуточную таблицу)
$sql_book_library_member = "CREATE TABLE IF NOT EXISTS book_library_member (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    member_id INT,
    FOREIGN KEY (book_id) REFERENCES books(id),
    FOREIGN KEY (member_id) REFERENCES library_members(id)
)";

if ($conn->query($sql_book_library_member) === TRUE) {
    echo "Table 'book_library_member' created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Закрываем соединение
$conn->close();

?>



<?php
$host = 'ваш_хост';
$db = 'ваша_база_данных';
$user = 'ваш_пользователь';
$pass = 'ваш_пароль';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Вставка данных в таблицу books
    $stmt = $pdo->prepare("INSERT INTO books (title, author_name) VALUES (:title, :author)");
    $stmt->bindParam(':title', $bookTitle);
    $stmt->bindParam(':author', $authorName);

    $bookTitle = "Название книги";
    $authorName = "Имя автора";
    $stmt->execute();

    // Вставка данных в таблицу members
    $stmt = $pdo->prepare("INSERT INTO members (name, email, join_date) VALUES (:name, :email, :joinDate)");
    $stmt->bindParam(':name', $memberName);
    $stmt->bindParam(':email', $memberEmail);
    $stmt->bindParam(':joinDate', $joinDate);

    $memberName = "Имя пользователя";
    $memberEmail = "example@example.com";
    $joinDate = "2024-02-29";
    $stmt->execute();

    // Вставка связи в таблицу book_member_relation
    $stmt = $pdo->prepare("INSERT INTO book_member_relation (book_id, member_id) VALUES (:bookId, :memberId)");
    $stmt->bindParam(':bookId', $bookId);
    $stmt->bindParam(':memberId', $memberId);

    $bookId = 1; // Идентификатор книги
    $memberId = 1; // Идентификатор члена библиотеки
    $stmt->execute();

} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
