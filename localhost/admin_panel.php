<?php
session_start();
require_once 'mysql.php';
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
    <link rel="stylesheet" href="css/style.css">
    <title>Админ панель</title>
</head>
<body>
        <section class="container">
            <div class="login">
                <h1>Панель Администратора</h1>
                        <?php
                        echo '<h3>Привет администратор: '.$proverka['name'].'<h3>';
                        ?>
                    </p>
				<form action="spisok_product.php">
		            <br>
		            <button>Список продуктов</button>
		        </form>
		        <form action="spisok_category.php">
		            <br>
		            <button>Список категорий</button>
		        </form>
		        <form action="spisok_users.php">
		            <br>
		            <button>Список Пользователей</button>
		        </form>
                <form action="spisok_article.php">
                    <br>
                    <button>Список Статьей</button>
                </form>
                <form action="index.html">
                    <br>
                    <button>Назад</button>
                </form>

                <form method="post" action="exit.php">

                    <p class="submit"><input type="submit"  name="commit" value="Выход"></p>
                </form>

            </div>
        </section>

</body>
</html>