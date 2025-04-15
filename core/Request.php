<?php

namespace app\core;

class Request
{
    public function getPath(){
        $path = $_SERVER['request_uri']?? '/';
        $position =strpos($path,'?');
        if ($position ===false){
            return $path;
        }
        return substr($path, 0 ,$position);


    }
    public function Method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);

    }
    public function isget()
    {
        return $this->Method() ===('get');

    }
    public function ispost()
    {
        return $this->Method() ===('post');

    }

    public function  getbody(){
         $body = [];
        if ($this->Method()==='get'){
            foreach ($_GET AS $key=> $value){
                $body [$key]= filter_input (INPUT_GET,$key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->Method()==='post'){
            foreach ($_POST AS $key=> $value){
                $body [$key]= filter_input (INPUT_POST,$key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}