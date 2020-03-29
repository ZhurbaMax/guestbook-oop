<?php
require_once("config.php");
require_once("app/controllers/registration/check.php");
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
    <?php include_once("app/views/registration/navigation.php");?>
</header>
    <?php include_once("app/views/registration/form.php");?>
</body>
</html>
