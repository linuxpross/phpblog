<?php
include 'config.php';

// Обработка отправки формы для добавления поста
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Обработка загрузки изображения
    $image = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = './img' . basename($_FILES['image']['name']);
        $uploadSuccess = move_uploaded_file($_FILES['image']['tmp_name'], $image);
        if (!$uploadSuccess) {
            die('Ошибка при загрузке изображения.');
        }
    }

    // Добавляем пост в базу данных
    $stmt = $pdo->prepare('INSERT INTO posts (title, content, image) VALUES (?, ?, ?)');
    $stmt->execute([$title, $content, $image]);

    // Перенаправляем на главную страницу
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить пост</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
        }
        form label, form input, form textarea, form button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        form input, form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        form button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добавить пост</h1>
        <form action="add_post.php" method="post" enctype="multipart/form-data">
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Содержимое:</label>
            <textarea id="content" name="content" required></textarea>
            <label for="image">Изображение:</label>
            <input type="file" id="image" name="image">
            <button type="submit">Добавить</button>
        </form>
    </div>
</body>
</html>
