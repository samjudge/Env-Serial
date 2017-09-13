<?php

require_once __DIR__ . "/vendor/autoload.php";

use Sootlib\Deserializer\Deserializable_Form;
use Sootlib\Deserializer\Deserializer;

class My_Form extends Deserializable_Form {
    public $a;
    public $b;
    public $c;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $form_model = Deserializer::deserialize_post(new My_Form());
}

?>
<html>
<head>
</head>
<body>
    <form method="POST">
        <label>
            A
            <input type="text" name="a">
        </label>
        <br/>
        <label>
            B
            <input type="text" name="b">
        </label>
        <br/>
        <label>
            C
            <input type="text" name="c">
        </label>
        <br/>
        <input type="submit">
        <br/>
    </form>
</body>
</html>
