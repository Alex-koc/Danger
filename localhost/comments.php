<?php
require_once 'mysql.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Коментарии</title>
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
                <a class="nav-link active" href="article.php">Статьи</a>
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

        <h1>Коментарии</h1>
        <?php
        $stmt = $pdo->query("SELECT *,comments.id AS idR FROM `comments` LEFT JOIN users ON comments.user = users.id WHERE `art` =".$id);
        echo "<table><tr><th>№</th><th>ИМЯ</th><th>Описание</th></tr>";
        while ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo '<td>'.$row['idR'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['text'].'</td>';
            echo "</tr>";

        }
        ?>
        </table>
        <br>

        <?php echo '<from method="post" action="comment.php?id="'.$id.'">';
              echo '<p class="submit"><input type="submit"  name="commit" value="Добавить коментарий"></p>';
              echo '</form>';
        ?>
        <form action="article.php">
            <br>
            <button>Вернуться в Статьи</button>
        </form>
    </div>
</section>
</body>
</html>