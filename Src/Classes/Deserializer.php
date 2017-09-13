<?php

namespace Sootlib\Deserializer;

require_once __DIR__ . "/../../vendor/autoload.php";

use Sootlib\Deserializer\Interfaces\Deserializable;

class Deserializer {
    public static function deserialize_post(Deserializable $d, array $input = NULL){
        if($input == NULL) $input = $_POST;
        $d->deserialize_from($input);
        return $d;
    }
}