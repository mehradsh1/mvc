<?php

namespace app\core;

abstract class model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }

        }
    }

    abstract public function rules(): array;

    public array $errors = [];

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $rulename = $rule;
                if (!is_string($rulename)) {
                    $rulename = $rule[0];
                }
                if ($rulename === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($rulename=== self::RULE_EMAIL && !filter_var($value ,FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute, self::RULE_EMAIL);
                }
            }
        }
        return  empty($this->errors);
    }

    public function addError(string $attribute, string $rule)
    {
        $message = $this ->errorMessages()[$rule]??'';

        $this->errors[$attribute][] = $message;
    }
    public function errorMessages(){
        return[
            self::RULE_REQUIRED => 'this field is requird',
            self::RULE_EMAIL => 'this field is requird',
            self::RULE_MIN => 'this field is requird',
            self::RULE_MAX => 'this field is requird',
            self::RULE_MATCH => 'this field is requird',


        ];
    }
}