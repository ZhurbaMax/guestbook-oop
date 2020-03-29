<?php
namespace app\controllers;
use app\core\Controller;

class RegistrController extends Controller
{
    public function registrationAction()
    {
        $this->view->render('Страница регистрации');
    }
}