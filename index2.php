<?php
require_once("config.php");
require "helper.php";
if (empty($_SESSION['user_id'])) {
    echo "Авторизируйтесь что бы оставить комментарий ";
}
$comment = new Comment();
if (!empty($_POST['comment'])) {
    $comment->comment = $_POST['comment'];
    $comment->userId = $_SESSION['user_id'];
    $comment->save();
}
$commentAll = $comment->findAll();
$comments = build_tree($commentAll);
unset($commentAll);
$comments = getCommentsTemplate($comments);

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

        <form method="POST" id="form1" style="display: none;">
            <div>Ответ:</div>
            <textarea name="comment"></textarea>
            <input type="submit" name="submit" value="Ответить">
        </form>
        <input type="button" value="Ответить" onclick="disp(document.getElementById('form1'))" />
    <?php endforeach;?>



    <div class="comments_wrap">
        <ul>
            <?php echo $comments;?>
        </ul>
    </div>



</div>
</body>
</html>
html:5


<?php
if(isset($_GET['login']))
?>
