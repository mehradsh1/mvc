<?php

namespace app\core;

class controller
{
    public string $layout = 'main';
    public function setlayout($layout){
        $this->layout =$layout;
    }
    public function render($view,$params=[])
    {
        return application::$app->router->renderView($view,$params);
    }

}