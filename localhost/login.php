<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Авторизация</title>
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
        <h1>Авторизация</h1>
        <form method="post" action="log.php">
            <p><input type="text" name="login" value="" placeholder="Логин или Email"></p>
            <p><input type="password" name="password" value="" placeholder="Пароль"></p>
            </p>
            <p class="submit"><input type="submit"  name="commit" value="Вход"></p>
        </form>
        <p>Вы не зарегистрированы? <a href="register.php">То нажмите сюда! </a> </p>
    </div>
</section>
</body>
</html>