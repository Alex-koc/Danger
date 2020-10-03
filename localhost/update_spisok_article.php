<?php
session_start();
require_once 'mysql.php';

if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT * FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $proverka = $stmt->fetch();
    $admin = $proverka['admin'];
    if($admin != 2){
        header('Location: http://localhost/user.php');
     }

} else {
    header('Location: http://localhost');
  
}

$id = $_GET['id'];

$s = $pdo->query("SELECT * FROM `article` WHERE id='".$id."'")->fetch();


if(isset($_POST['commit']))
{
    $name=$_POST['name'];
    $text=$_POST['text'];
    $price=$_POST['photo'];


    $sql ="UPDATE `article` SET name='".$name."', text='".$text."', photo='".$photo."'  WHERE id='".$id."'";
    $stm = $pdo->query($sql);

    header('Location: http://localhost/spisok_article.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Редактирование Статьи<?php echo'<p>'.$proverka['name'].'</p>'?></title>
</head>
<body>
<section class="container">
    <div class="login">
        <?php Echo'<h1>Обновить Товар('.$s["name"].')</h1> '; ?>
       <form method="post" enctype="multipart/form-data">        <?php
            Echo'<p><input type="text" name="name" value="'.$s["name"].'" placeholder="Название"></p>';
            Echo'<p><input type="text" name="text" value="'.$s["text"].'" placeholder="Описание"></p>';
            Echo'<p><input type="file" name="phote" value="'.$s["phote"].'" placeholder=""></p>';
            Echo'<p><input type="hidden" name="id" value="'.$id.'" placeholder="Цена"></p>';
            Echo'<p class="submit"><input type="submit" name="commit" value="Редактировать"></p>';
            ?>
        </form>
    </div>
</section>
</body>
