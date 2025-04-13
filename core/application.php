<?php


namespace app\core;



class application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public static application $app;
    public function __construct($rootPath)
    {
        self:: $ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);

    }
    public function run(){
        $this->router->resolve();



    }
}

