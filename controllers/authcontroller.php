<?php

namespace app\controllers;

use app\core\controller;

class authcontroller extends controller
{
    public function login()
    {
        return $this->render('login');

    }
    public function register()
    {
        return $this->render('register');
    }


}