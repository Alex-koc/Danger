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
        $stmt = $pdo->query("SELECT * FROM `comments`  WHERE `art` =".$id);
        echo "<table><tr><th>Название</th><th>Описание</th></tr>";
        while ($row = $stmt->fetch())
        {
            echo "<tr>";
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
    </div>
</section>
</body>
</html>