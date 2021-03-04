<?php

namespace App\Service;

/** Greeter means 'saluer' in french
 * Pour que la variable $name puisse fonctionner dans le service il faudra au préalable l'avoir
 * configurée dans config/services.yaml
 */

class Greeter {

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function greet()
    {
        return sprintf("Hello %s !", $this->name);
    }
}