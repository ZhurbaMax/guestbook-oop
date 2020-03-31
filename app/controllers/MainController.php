<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Comment;


class MainController extends Controller
{
    public function indexAction()
    {

        if (empty($_SESSION['user_id'])) {
            echo "Авторизируйтесь что бы оставить комментарий ";
        }
        $comment = new Comment;
        if (!empty($_POST['comment'])) {
            $comment->comment = $_POST['comment'];
            $comment->userId = $_SESSION['user_id'];
            $comment->save();

        }
        $comments = $comment->findAll();


        $this->view->render('Страница камментариев', ['comments'=>$comments, 'title'=>'Страница камментариев']);
    }
}

