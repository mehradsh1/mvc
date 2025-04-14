<?php

namespace app\controllers;

use app\core\application;
use app\core\controller;

class siteController extends controller
{
    public function home()
    {
        $params = [
            'name'=> "mehrad"
        ];
        return $this->render('home',$params);
    }
    public function contact()
    {
        return $this->render('contact');
    }
    public function handlingcontact()
    {
        $body= application::$app->request->getbody();
        return ' handling submitted data';
    }


}