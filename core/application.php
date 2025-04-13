<?php


namespace app\core;



class application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public function __construct($rootPath)
    {
        Self:: $ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->router = new Router($this->request);

    }
    public function run(){
        $this->router->resolve();



    }
}

