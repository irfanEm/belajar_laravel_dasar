<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use App\Services\HelloService;
use Illuminate\Foundation\Application;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServiceContainerTest extends TestCase
{
    public function testDependencyInjection()
    {
        $foo = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals("Foo", $foo->foo());
        self::assertEquals("Foo", $foo2->foo());
        self::assertNotSame($foo, $foo2);

    }

    public function testBind()
    {
        $person = $this->app->bind(Person::class, function($app){
            return new Person("Irfan", "Machmud");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Irfan", $person1->firstName);
        self::assertEquals("Machmud", $person2->lastName);
        self::assertNotSame($person1, $person2);
    }


    public function testSingleton()
    {
        $person = $this->app->singleton(Person::class, function($app){
            return new Person("Irfan", "Machmud");
        });

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Irfan", $person1->firstName);
        self::assertEquals("Machmud", $person2->lastName);
        self::assertSame($person1, $person2);
    }

        public function testInstance()
    {
        $person = new Person("Irfan", "Machmud");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals("Irfan", $person1->firstName);
        self::assertEquals("Machmud", $person2->lastName);
        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
    }

        public function testDependencyInjection2()
    {
        $this->app->singleton(Foo::class, function($app){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app)
        {
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar1 = $this->app->make(Bar::class);


        self::assertEquals("Foo and Bar", $bar->bar());
        self::assertSame($foo, $bar->foo);
        self::assertSame($bar, $bar1);
    }

    public function testInterfacetoClass()
    {
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        $this->app->singleton(HelloService::class, function($app) {
            return new HelloServiceIndonesia();
            });

        $helloservice = $this->app->make(HelloService::class);

        self::assertEquals("Halo Irfan", $helloservice->hello("Irfan"));
    }

}
