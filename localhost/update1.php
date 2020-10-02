<?php

$id = $_GET['id'];


require_once 'mysql.php';
$stmt = $pdo->query("SELECT * FROM `product` WHERE id='".$id."'")->fetch();


if(isset($_POST['commit']))
{
    $name=$_POST['name'];
    $text=$_POST['text'];
    $price=$_POST['price'];



    $sql ="UPDATE `product` SET name='".$name."', text='".$text."', price='".$price."'  WHERE id='".$id."'";
    $stm = $pdo->query($sql);

    header('Location: spisok_product.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Товары</title>
</head>
<body>
<section class="container">
    <div class="login">
        <?php Echo'<h1>Обновить Товар('.$stmt["name"].')</h1> '; ?>
       <form method="post" enctype="multipart/form-data">        <?php
            Echo'<p><input type="text" name="name" value="'.$stmt["name"].'" placeholder="Название"></p>';
            Echo'<p><input type="text" name="text" value="'.$stmt["text"].'" placeholder="Описание"></p>';
            Echo'<p><input type="text" name="price" value="'.$stmt["price"].'" placeholder="Цена"></p>';
            Echo'<p><input type="hidden" name="id" value="'.$id.'" placeholder="Цена"></p>';
            Echo'<p class="submit"><input type="submit" name="commit" value="Редактировать"></p>';
            ?>
        </form>
    </div>
</section>
</body>
