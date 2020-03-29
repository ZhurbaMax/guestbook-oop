<?php
if (!empty($_SESSION['user_id'])) {
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