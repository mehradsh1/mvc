<?php

namespace app\core;

class controller
{
    public function render($view,$params=[])
    {
        return application::$app->router->renderView($view,$params);
    }

}