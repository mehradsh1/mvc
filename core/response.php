<?php

namespace app\core;

class response
{
    public function setstatuscode(int $code){

        http_response_code($code);
    }

}