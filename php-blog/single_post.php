<?php
include 'config.php';

// Получаем ID поста из URL
$id = $_GET['id'] ?? null;

// Получаем информацию о посте из базы данных
$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $post['title']; ?></title>
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
        .post-image {
            max-width: 100%;
            height: auto;
        }
        .a2{
            color:black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $post['title']; ?></h1>
        <?php if ($post['image']): ?>
            <img src="<?php echo $post['image']; ?>" alt="Изображение поста" class="post-image">
        <?php endif; ?>
        <p><?php echo nl2br($post['content']); ?></p>
        <a href="index.php" class="a2">Назад к списку постов</a>
    </div>
</body>
</html>
