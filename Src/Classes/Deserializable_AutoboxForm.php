<?php

namespace Sootlib\Deserializer;

require_once __DIR__ . "/../../vendor/autoload.php";

use Sootlib\Deserializer\Exceptions\MissingFieldInputException;
use Sootlib\Deserializer\Exceptions\UnexpectedInputFieldException;
use Sootlib\Deserializer\Interfaces\Deserializable;

abstract class Deserializable_Form implements Deserializable {
    public function deserialize_from(array $env = NULL){
        if($env == NULL) $env = $_POST;
        $variables = get_class_vars(get_called_class());
        foreach($env as $k=>$v){
            $this->$k = $v;
        }
        foreach($variables as $k=>$v){
            if(!array_key_exists($k, $env)){
                throw new MissingFieldInputException(
                    "The field `$k` is not present from the given environment variables"
                );
            }
        }
    }

    public function __set($n, $v){
        if(!property_exists($this, $n)){
            throw new UnexpectedInputFieldException(
                "The field `$n` is not delcared as part of this model"
            );
        } else {
            $this->$n = $v;
        }
    }
}