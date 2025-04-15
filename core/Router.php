<?php
namespace app\core;


use http\Params;

class Router{
    public Request $request;
    public Response $response;
    protected array $routes =[];

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct  (Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path , $callback)
    {


        $this->routes['get'][$path] = $callback;  
    }
    public function post($path , $callback)
    {


        $this->routes['post'][$path] = $callback;
    }
    public function resolve(){
       $path = $this->request->getPath();        $method = $this->request->Method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false){
          $this->response->setstatuscode(404);
            return $this->renderView(_404);

        }
        if (is_string($callback)){
             return $this->renderView($callback);


        }
        if(is_array($callback)){
            $callback[0] = new $callback[0]();
        }
        return call_user_func($callback, $this->request);

    }
    public function  renderView($view,$params= []){
        $layoutcontent =$this->layoutcontent();
        $viewcontent= $this->renderOnlyview($view, $params);
        return str_replace('{{content}}',$viewcontent, $layoutcontent);



    }
    public function  rendercontent($viewcontent,$params){
        $layoutcontent =$this->layoutcontent();
        $viewcontent= $this->renderOnlyview($viewcontent,$params);
        return str_replace('{{content}}',$viewcontent, $layoutcontent);



    }
    protected function layoutcontent(){
        ob_start();
        include_once application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }
    protected function renderOnlyview($view, $params ){
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();

    }
}
