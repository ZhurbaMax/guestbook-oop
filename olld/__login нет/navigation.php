<ul class="nav">
    <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
            echo "hidden-menu";
        } ?>" href="index.php">Комментарии</a></li>
    <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
            echo "hidden-menu";
        } ?>" href="registration.php">Регистрация</a></li>
    <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
            echo "hidden-menu";
        } ?>" href="login.php">Авторизация</a></li>
</ul>