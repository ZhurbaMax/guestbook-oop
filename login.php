<?php
require_once("config.php");
if (!empty($_SESSION['user_id'])) {
    header("location: /index.php");
}

$errors = [];
if (!empty($_POST)){
    if(empty($_POST['user_name'])){
        $errors[] = 'Пожалуйста введите имя пользователя';
    }
    if (empty($_POST['password'])){
        $errors[] = 'Введите более пароль';
    }
    if (empty($errors)) {
        $user = new User();
        $user = $user->checkLogin($_POST['user_name'], sha1($_POST['password'].SALT));
        if (!empty($user->id)) {
            $_SESSION['user_id'] = $user->id;
            header("location: /index.php");
            exit;
        } else {
            $errors[] = 'Пожалуйста, введите действительные учетные данные';
        }
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Guest Book</title>
    <meta charset="UTF-8">
    <link href="css/style.css" media="screen" rel="stylesheet">
</head>
<body>
<header>
    <ul>
        <li><a href="index.php">Комментарии</a></li>
        <li><a href="registration.php">Регистрация</a></li>
        <li><a href="login.php">Авторизация</a></li>
    </ul>
</header>
<div class="body-content">
<h1>Вход</h1>
<div>
    <form method="POST">
        <div style="color: red;">
            <?php foreach ($errors as $error) :?>
                <p><?php echo $error;?></p>
            <?php endforeach; ?>
        </div>
        <div>
            <label>Логин или Email:</label>
            <div>
                <input type="text" name="user_name" required="" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>"/>
            </div>
        </div>
        <div>
            <label>Пароль:</label>
            <div>
                <input type="password" name="password" required="" value=""/>
            </div>
        </div>
        <div>
            <br/>
            <input type="submit" name="submit" value="Войти">
        </div>
    </form>
</div>
</div>
</body>
</html>
