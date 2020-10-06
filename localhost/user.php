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
    <link rel="stylesheet" href="css/style.css">
    <title>Личный кабинет</title>

</head>
<body>
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
                <form method="post" action="exit.php">
                    <p class="submit"><input type="submit"  name="commit" value="Выход"></p>
                </form>
            <form action="index.html">
                <button>Назад</button>
            </form>

            </div>
        </section>

</body>
</html>