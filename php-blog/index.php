<?php
include 'config.php';

// Получаем список постов из базы данных
$stmt = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Мини-блог</title>
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
        .post {
            margin-bottom: 20px;
        }
        .post-title {
            font-size: 24px;
            margin: 0;
        }
        .post-content {
            font-size: 16px;
        }
        .post-image {
            max-width: 100%;
            height: auto;
        }
        .a1{
            color:black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Мини-блог</h1>
     <h3><a href="add_post.php" class="a1">Добавить пост</a></h3>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h2 class="post-title"><a href="single_post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
               
                <p class="post-content"><?php echo nl2br(substr($post['content'], 0, 150)); ?>...</p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
