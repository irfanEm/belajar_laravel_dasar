<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Services\HelloService;
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

    public function testPropertySingleton()
    {
        $helloservice1 = $this->app->make(HelloService::class);
        $helloservice2 = $this->app->make(HelloService::class);

        self::assertSame($helloservice1, $helloservice2);

        self::assertEquals('Halo Irfan', $helloservice1->hello('Irfan'));

    }
}
