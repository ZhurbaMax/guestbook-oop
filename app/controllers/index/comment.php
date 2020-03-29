<?php
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
