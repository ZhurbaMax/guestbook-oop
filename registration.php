<?php
require_once("config.php");
if (!empty($_SESSION['user_id'])) {
}
$errors = [];
if (!empty($_POST)){
    $validator = new Validator(new DB());
    foreach ($_POST as $k => $v) {
        $validator->checkEmpty($k, $v);
    }
    $validator->checkMaxLength('user_name', $_POST['user_name'], 'users', 'username');
    $validator->checkMaxLength('first_name', $_POST['first_name'], 'users', 'first_name');
    $validator->checkMaxLength('last_name', $_POST['last_name'], 'users', 'last_name');
    $validator->checkMinLength('password', $_POST['password'], 6);
    $validator->checkMatch('password', $_POST['password'], 'confirm_password', $_POST['confirm_password']);
    $errors = $validator->errors;

    if (empty($errors)) {
        $user = new User();
        $user->userName = $_POST['user_name'];
        $user->email = $_POST['email'];
        $user->firstName = $_POST['first_name'];
        $user->lastName = $_POST['last_name'];
        $user->country = $_POST['country'];
        $user->city = $_POST['city'];
        $user->gender = $_POST['gender'];
        $user->password = sha1($_POST['password'].SALT);
        $user->save();
        header("location: /login.php");
        exit;
    }


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Страница регистрации</title>
    <meta charset="UTF-8">
    <link href="css/style.css" media="screen" rel="stylesheet">
</head>
<body>
<header>
    <ul>
        <li><a href="index.php">Комментарии</a></li>
        <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
            echo "hidden-menu";
            } ?>" href="registration.php">Регистрация</a></li>
        <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
                echo "hidden-menu";
            } ?>" href="login.php">Авторизация</a></li>
    </ul>
</header>
<div class="body-content container mlogin">
    <h1>Регистрация</h1>
    <div>
        <form method="POST">
            <div style="color: red;">
                <?php foreach ($errors as $error) :?>
                    <p><?php echo $error;?></p>
                <?php endforeach; ?>
            </div>
            <div>
                <label>Логин:</label>
                <div>
                    <input type="text" name="user_name" id="username" required="" value="<?php echo (!empty($_POST['user_name']) ? $_POST['user_name'] : '');?>"/>
                    <span id="username_error" style="color: red;"></span>
                </div>
            </div>
            <div>
                <label>Email:</label>
                <div>
                    <input type="email" name="email" id="email" required="" value="<?php echo (!empty($_POST['email']) ? $_POST['email'] : '');?>"/>
                    <span id="email_error" style="color: red;"></span>
                </div>
            </div>
            <div>
                <label>Имя:</label>
                <div>
                    <input type="text" name="first_name" required="" value="<?php echo (!empty($_POST['first_name']) ? $_POST['first_name'] : '');?>"/>
                </div>
            </div>
            <div>
                <label>Фамилия:</label>
                <div>
                    <input type="text" name="last_name" required="" value="<?php echo (!empty($_POST['last_name']) ? $_POST['last_name'] : '');?>"/>
                </div>
            </div>
            <div>
                <label>Страна:</label>
                <div>
                    <select class="select" name="country" >
                        <option value="Укажите страну">Укажите страну</option>
                        <option value="Украина">Украина</option>
                        <option value="Англия">Англия</option>
                        <option value="Беларусь">Беларусь</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Город:</label>
                <div>
                    <select class="select" name="city">
                        <option value="Укажите город">Укажите город</option>
                        <option value="Киев">Киев</option>
                        <option value="Львов">Львов</option>
                        <option value="Ливерпуль">Ливерпуль</option>
                        <option value="Манчестер">Манчестер</option>
                        <option value="Минск">Минск</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Пол:</label>
                <div>
                    <select class="select" name="gender">
                        <option value="Укажите пол">Укажите пол</option>
                        <option value="Мужской">Мужской</option>
                        <option value="Женский">Женский</option>
                        <option value="Всякое бывает">Всякое бывает</option>
                    </select>
                </div>
            </div>
            <div>
                <label>Пароль:</label>
                <div>
                    <input type="password" name="password" required="" value=""/>
                </div>
            </div>
            <div>
                <label>Подтвердите пароль:</label>
                <div>
                    <input type="password" name="confirm_password" required="" value=""/>
                </div>
            </div>
            <div>
                <br/>
                <input class="button" type="submit" name="submit" id="submit" value="Зарегистрироваться">
            </div>
        </form>
    </div>
</div>

</body>
</html>
