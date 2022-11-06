<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FooBarTestProvider extends TestCase
{
    public function testFooBarTestProvider()
    {
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);

        self::assertSame($foo, $bar->foo);

        $foo2 = $this->app->make(Foo::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($foo, $foo2);
        self::assertSame($bar, $bar2);
        self::assertSame($foo2, $bar2->foo);
    }
}
