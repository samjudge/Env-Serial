# Env-Serial
PHP environment var to model serializer (validates input so you don't have to!) 

Part of my the /sootlib namespace (like all my cantrips).

Pretty simple little cantrip. I made this because using a bunch of isset($_POST[...]) is ugly as hell!! :)

Simply create a model/entity that inherits from `Deserializable_Form`, with property names equal to the names in your form.

```
use Sootlib\Deserializer\Deserializable_Form;

class My_Useless_Form extends Deserializable_Form {
    private $address_line_1; //<input name="address_line_1">
    private $postcode; //<input name="postcode">
    private $email; //<input name="email">
}
```

You can even load in arrays if you use the `<input name="address_lines[]">` way of naming/need a variable number of inputs.

```
use Sootlib\Deserializer\Deserializable_Form;

class My_Form extends Deserializable_Form {
    public $address_lines; //<input name="address_lines[]">
}
```

Of course, feel free to implement Sootlib\Deserializer\Deserializable if you want to do something special.

Inside your php script, you can call the static method `deserialize_post(Deserializer::Deserializable $d)` to populate your entity.

```
$strict_form = Deserializer::deserialize_post(new My_Form());
```

It even throws Exceptions if your provided object doesn't fit the mold issued from your POST enviroment string, or if your form is missing some properties.

Keep it strict and clean guys ! :)
