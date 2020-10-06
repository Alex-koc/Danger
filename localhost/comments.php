<?php
require_once 'mysql.php';
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Коментарии</title>
    <style>
        .login {
            width: 620px;
        }
    </style>
</head>
<body>
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
        <form action="article.php">
            <br>
            <button>Назад</button>
        </form>
        <?php echo '<from method="post" action="comment.php?id="'.$id.'">';
              echo '<p class="submit"><input type="submit"  name="commit" value="Добавить коментарий"></p>';
              echo '</form>';
        ?>
    </div>
</section>
</body>
</html>