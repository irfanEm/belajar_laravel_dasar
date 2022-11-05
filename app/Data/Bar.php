<?php

namespace App\Data;

use App\Data\Foo;

class Bar
{
    public Foo $foo;
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    function Bar():string
    {
        return $this->foo->Foo() . " and Bar";
    }
}
