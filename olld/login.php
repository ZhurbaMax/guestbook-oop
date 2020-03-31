<?php
require_once("config.php");
include_once ("app/controllers/login/check.php");


?>

<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <meta charset="UTF-8">
    <link href="css/style.css" media="screen" rel="stylesheet">
</head>
<body>
<header>
    <?php include_once("app/views/login/navigation.php");?>
</header>
    <?php include_once("app/views/login/form.php");?>
</body>
</html>
