<?php

namespace app\controllers;

use app\core\controller;
use app\core\Request;

class authcontroller extends controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');

    }
    public function register(Request $request)
    {
        if($request->ispost()){
            return 'handle submitted data';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }


}