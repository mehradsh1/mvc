<?php


namespace app\core;



class application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public function __construct($rootPath)
    {
        self:: $ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);

    }
    public function run(){
        $this->router->resolve();



    }
}

