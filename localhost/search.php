<!doctype html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Товары</title>
    <style>

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
                    <a class="nav-link active" href="spisok.php">Товары</a>
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
        <h1>Таблица товаров</h1
        <?php
        require_once 'mysql.php';
        $search = $_POST['search'];
        $stmt= $pdo->query("SELECT * FROM product WHERE `product`.`name` LIKE '%".$search."%'");
        echo "<table><tr><th>№</th><th>Товары</th><th>Описание</th><th>Цена</th><th>Фото</th></tr>";
         while  ($row = $stmt->fetch())
        {
            echo "<tr>";
            echo '<td>'.$row['id'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['text'].'</td>';
            echo '<td>'.$row['price'].'</td>';
            echo '<td><img src="images/'.$row['photo'].'" alt="Здесь должна быть картинка" width="150" height="150"></td>';
            echo "</tr>";

        }
        ?>
        </table>
        <br>
        <form action="spisok.php">
            <br>
            <button>Вернуться назад</button>
        </form>
    </div>
</section>
</body>
</html>
