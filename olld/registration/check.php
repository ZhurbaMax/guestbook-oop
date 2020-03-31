<?php
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