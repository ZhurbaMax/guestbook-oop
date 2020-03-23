<?php
require_once("config.php");
if (empty($_SESSION['user_id'])) {
    echo "Авторизируйтесь что бы оставить комментарий ";
}
$comment = new Comment();
if (!empty($_POST['comment'])) {
    $comment->comment = $_POST['comment'];
    $comment->userId = $_SESSION['user_id'];
    $comment->save();
}
$comments = $comment->findAll();
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Страница комментариев</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <style>
        #comments-header{ text-align: center;}
        #comments-form{border: 1px dotted black; width: 50%; padding-left: 20px;}
        #comments-form textarea{width: 70%; min-height: 100px;}
        #comments-panel{border: 1px dashed black; width: 50%; padding-left: 20px; margin-top: 20px;}
        .comment-date{font-style: italic}
    </style>
</head>
<body>
<header>
    <ul>
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
</header>
<div id="comments-header">
    <h1>Страница комментариев</h1>
</div>
<div id="comments-form">
    <h3>Пожалуйста оставте свой коментарий</h3>
    <form method="POST">
        <div>
            <label>Оставте коментарий</label>
            <div>
                <textarea name="comment"> </textarea>
            </div>
        </div>
        <div>
            <br>
            <input type="submit" name="submit" value="Написать">
        </div>
    </form>
</div>
<div id="comments-panel">
    <h3>Комментарии:</h3>
    <?php foreach ($comments as $comment) : ?>
        <p <?php if ($comment['user_id'] == $_SESSION['user_id']) {
            echo 'style="font-weight: bold;"';
        }?>><span class="comment-date-user"><?php echo $comment['username'];?> </span> <?php echo $comment['comment'];?> <span class="comment-date">(<?php echo $comment['created_at'];?>)
            </span>
        </p>

        <!--<form method="POST">
                <div>
                    <textarea name="comment" class="replay"> </textarea>
                </div>
            <div>
                <input type="submit" name="submit" value="Ответить">
            </div>
     </form>-->
        <a href="#comments-form" class="reaply" id="<?php echo $comment['parent_id'];?>">Ответить</a>

    <?php endforeach;?>
</div>
</body>
</html>
