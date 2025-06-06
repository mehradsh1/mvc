<?php

namespace app\models;
use app\core\model;

class registerModel extends model
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
    public string $confirm_password;

    public function register(){
        echo "creating new user";
    }

    public function rules(): array
    {
        return  [
            'firstname'=> [self::RULE_REQUIRED],
            'lastname'=> [self::RULE_REQUIRED],
            'email'=> [self::RULE_REQUIRED,self::RULE_EMAIL],
            'password'=> [self::RULE_REQUIRED, [self::RULE_MIN , 'min' => 8],[self::RULE_MAX, 'max' => 20]],
            'confirm_password'=> [self::RULE_REQUIRED,[self::RULE_MATCH, 'match'=> 'password']],

        ];
    }


}