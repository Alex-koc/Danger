<?php
require_once 'mysql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Товары</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>
<section class="container">
    <div class="login">
        <form name="search" method="post" action="search.php">
            <input type="" name="search" placeholder="Поиск">
            <button type="submit">Найти</button>
        </form>

        <h1>Таблица товаров</h1>
        <?php
        $stmt = $pdo->query('SELECT *, `product`.id AS idR FROM `product` ORDER BY idR ASC');
        echo "<table><tr><th>№</th><th>Товары</th><th>Описание</th><th>Цена</th><th>Фото</th></tr>";
        while ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo '<td>'.$row['idR'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['text'].'</td>';
            echo '<td>'.$row['price'].'</td>';
            echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="150" height="150"></td>';
            echo "</tr>";

        }
        ?>
        </table>
        <br>
        <form name="filter" method="post" action="filtr.php">
            <input type="" name="filter" placeholder="Фильтр по товару">
            <input type="" name="filter1" placeholder="Фильтр по цене">
            <button type="submit">Фильтровать</button>
        </form>
        <form action="index.html">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>