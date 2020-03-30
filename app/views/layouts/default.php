<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <style>
        #comments-header{ text-align: center;}
        #comments-form{border: 1px dotted black; width: 70%; padding-left: 20px;}
        #comments-form textarea{width: 70%; min-height: 100px;}
        .comment-date{font-style: italic}
    </style>
    <script>
        function disp(form) {
            if (form.style.display == "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
</head>
<body>
<ul class="nav">
    <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
            echo "hidden-menu";
        } ?>" href="/">Комментарии</a></li>
    <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
            echo "hidden-menu";
        } ?>" href="registration">Регистрация</a></li>
    <li><a class=" <?php if (!empty($_SESSION['user_id'])) {
            echo "hidden-menu";
        } ?>" href="login">Авторизация</a></li>
</ul>
        <?php echo $content; ?>
</body>
</html>

