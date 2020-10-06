<?php
session_start();
require_once 'mysql.php';
if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $idR = $proverka['id'];

} else {
    header('Location: http://localhost');
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Статья</title>
</head>
<body>
<section class="container">
    <div class="login">
        <h1>Добавить статью</h1>
            <form method="post" enctype="multipart/form-data" action="article_add.php">
            <?php echo '<input type="hidden" name="user" value="'.$idR.'" placeholder="'.$idR.'">'; ?>
                <p><input type="text" name="name" value="" placeholder="Название"></p>
                <p><input type="text" name="text" value="" placeholder="Описание"></p>
                <p><input type="file" name="photo" value=""></p>

                <p class="submit"><input type="submit" name="commit" value="Добавить"></p>
            </form>
        <form action="spisok_article.php">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>