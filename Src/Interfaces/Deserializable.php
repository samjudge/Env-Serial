<?php

namespace Sootlib\Deserializer\Interfaces;

require_once __DIR__ . "/../../vendor/autoload.php";

interface Deserializable{
    public function deserialize_from(array $env);
}