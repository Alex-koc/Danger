<?php
require_once 'mysql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Категории</title>
    <style>
        .login {
            width: 450px;
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
            <li class="nav-item">
                <a class="nav-link" href="spisok.php">Товары</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="spisok1.php">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="article.php">Статьи</a>
            </li>

        </ul>

    </div>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="user.php"><input class="btn btn-info ml-1" type="button" value="Личный кабинет"></a>
            </li>
        </ul>

</nav>
<section class="container">
    <div class="login">
        <h1>Таблица категорий</h1>
        <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Название</th>
            </tr>
            <?php
            $stmt = $pdo->query('SELECT *, `category`.id AS idR FROM `category` ORDER BY idR ASC');
            while ($row = $stmt->fetch())
            {
                echo "<tr>";
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['name'].'</td>';
                echo "</tr>";

            }

            ?>
        </table>
        <br>

    </div>
</section>
</body>
</html>