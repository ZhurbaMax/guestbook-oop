<?php
namespace app\controllers;

use app\core\Controller;
use app\models\User;

class AccountController extends Controller
{
    public function loginAction()
    {


        if (!empty($_SESSION['user_id'])) {
        }


        $errors = [];
        if (!empty($_POST)) {
            if (empty($_POST['user_name'])) {
                $errors[] = 'Пожалуйста введите имя пользователя';
            }
            if (empty($_POST['password'])) {
                $errors[] = 'Введите пароль';
            }
           if (empty($errors)) {
                $user = new User;
                $user = $user->checkLogin($_POST['user_name'], sha1($_POST['password']));
                if (!empty($user->id)) {
                    $_SESSION['user_id'] = $user->id;
                    header("location: /");
                    exit;
                } else {
                    $errors[] = 'Пожалуйста, введите действительные учетные данные';
                }
            }

        }
        $this->view->render('Страница Входа', ['errors'=> $errors]);

    }

}
