<?php
require_once 'mysql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Товары</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">Шестёрочка</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="spisok.php">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="spisok1.php">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="article.php">Статьи</a>
            </li>

        </ul>
    </div>
    <form name="filter" method="post" action="filtr.php" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="" name="filter" placeholder="Фильтр по товару">
        <input class="form-control mr-sm-2" type="" name="filter1" placeholder="Фильтр по цене">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Фильтровать</button>
    </form>

    <ul></ul>
    <form name="search" method="post" action="search.php" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="" name="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
    </form>
    <ul></ul>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="user.php"><input class="btn btn-info ml-1" type="button" value="Личный кабинет"></a>
            </li>
        </ul>

</nav>

<section class="container">
    <div class="login">

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


    </div>
</section>
</body>
</html>