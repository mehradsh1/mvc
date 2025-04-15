<?php

namespace app\controllers;

use app\core\controller;
use app\core\Request;
use app\models\registerModel;
use app\models;

class authcontroller extends controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');

    }
    public function register(Request $request)
    {
        $registerModel = new registerModel();
        if($request->ispost()){

            $registerModel->loadData($request->getBody());
            if($registerModel->validate() && $registerModel->register()){
                return 'success';
            }
            return $this->render('register',[
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register',[
            'model' => $registerModel
        ]);
    }



}