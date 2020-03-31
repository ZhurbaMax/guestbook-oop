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


function mapTree($dataset, $parent=null) {
    $tree = array();
    foreach ($dataset as $id=>$node) {
        if ($node['parent_id'] !== $parent) continue;
        $node['children'] = mapTree($dataset, $id);
        $tree[$id] = $node;
    }
    return $tree;

}
$trees = mapTree($comments);
echo "<pre>";
print_r($tree);
echo "</pre>";

echo "<pre>";
print_r($comments);
echo "</pre>";

function build_tree($data){
    $tree = array();
    foreach($data as $id => &$row){
        if(empty($row['parent_id'])){
            $tree[$id] = &$row;
        }
        else{
            $data[$row['parent_id']]['childs'][$id] = &$row;
        }
    }

    return $tree;
}
$tree = build_tree($comments);
unset($_comments);

echo "<pre>";
print_r($tree);
echo "</pre>";


$mas = array(
    array('username' => 'user',
        'comment' => 'коммент',
        'created_at' => '20.08.2020',
        'chaildren' => array('username' => 'user',
            'comment' => 'коммент',
            'created_at' => '20.08.2020',
            'chaildren' => array('username' => 'user',
                'comment' => 'коммент',
                'created_at' => '20.08.2020'))),
    array('username' => 'user',
        'comment' => 'коммент',
        'created_at' => '20.08.2020')
);
//echo "<pre>";
// print_r($mas);
//echo "</pre>";

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Страница комментариев</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <style>
        #comments-header{ text-align: center;}
        #comments-form{border: 1px dotted black; width: 70%; padding-left: 20px;}
        #comments-form textarea{width: 70%; min-height: 100px;}
        #comments-panel{border: 1px dashed black; width: 70%; padding-left: 20px; margin-top: 20px;}
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
<div class="comments_wrap2">
    <h2>Комментарии:</h2>
    <ul>
        <li>
            <span>User</span>
            <span>24.03.2020</span>
            <div>Текст ответа 2й вложенности</div>
            <input type="submit" name="submit" value="Ответить">
        </li>
    </ul>
</div>


</body>
</html>


