<?php
require_once 'mysql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Категории</title>
    <style>
        .login {
            width: 450px;
        }
    </style>
</head>
<body>
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
        <form action="index.html">
            <br>
            <button>Назад</button>
        </form>
    </div>
</section>
</body>
</html>