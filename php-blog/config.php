<?php
// Конфигурация подключения к базе данных
$host = 'localhost';
$dbname = 'blog';
$username = 'root'; // Замените на ваше имя пользователя MySQL, обычно это 'root'
$password = ''; // Замените на ваш пароль MySQL, если он есть

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>
