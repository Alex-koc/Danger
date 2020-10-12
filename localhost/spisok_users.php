<?php
session_start();
require_once 'mysql.php';

$sql = "SELECT * FROM `category`";
$result = $pdo->query($sql);

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
        <h1>Таблица товаров</h1>
                <table class = "table table-borderless">
            <thead class="text-center">
            <tr>
                <th>№</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Админ</th>
                <th>Сделать(Админ/Польз)</th>
            </tr>
                        <?php
                        $article = $pdo->query('SELECT * FROM `users` ORDER BY id DESC');
                         while ($row = $article->fetch())
                        {
                            echo "<tr>";
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['login'].'</td>';
                            echo '<td>'.$row['name'].'</td>';
                            echo '<td>'.$row['phone'].'</td>';
                            if($row['admin'] == 2){
                                echo '<td><a>Администратор</a></td>';
                            }else{
                                echo '<td><a>Пользователь</a></td>';
                            }
                            echo '<td><a href="update_users.php?id='.$row['id'].'">Редактировать</a></td>';
                            echo "</tr>";

                        }
                        ?>
                        </table>
        <br>
        <form action="admin_panel.php">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>