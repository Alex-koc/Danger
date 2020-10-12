<?php
session_start();
require_once 'mysql.php';

if(isset($_SESSION['auth']))
{
    $stmt= $pdo->query('SELECT *, `users`.id AS ID FROM `users` WHERE login="'.$_SESSION['auth'].'"');
    $result = $stmt->fetch();
    $admin = $result['admin'];
        if($admin == 2){
            header('Location: http://localhost/admin_panel.php');
        }
} else {
    header('Location: http://localhost/login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Личный кабинет</title>

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
                <li class="nav-item">
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
                <h1>Личный кабинет</h1>
                        <?php
                        echo '<p>Логин: '.$result['login'].'<p>';
                        echo '<p>Имя: '.$result['name'].'<p>';
                        echo '<p>Телефон: '.$result['phone'].'<p>';
                        ?>
                <h2>Статьи Пользователя:</h2>
                <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Фото</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
                        <?php
                        $article = $pdo->query("SELECT * FROM `article` WHERE `article`.user =".$result['ID']);
                         while ($row = $article->fetch())
                        {
                            echo "<tr>";
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td><a href="comments.php?id='.$row['id'].'">'.$row['name'].'</a></td>';
                            echo '<td>'.$row['text'].'</td>';
                            echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="150" height="150"></td>';
                            echo '<td><a href="u_s_a.php?id='.$row['id'].'">Редактировать</a></td>';
                            echo '<td><a href="d_s_a.php?id='.$row['id'].'">Удалить</a></td>';
                            echo "</tr>";

                        }
                        ?>
                        </table>
                        <form action="articles.php">
                            <button>Создать статью</button>
                        </form>
                <br>
                <form method="post" action="exit.php">
                    <p class="submit"><input type="submit"  name="commit" value="Выход"></p>
                </form>

            </div>
        </section>
</body>
</html>