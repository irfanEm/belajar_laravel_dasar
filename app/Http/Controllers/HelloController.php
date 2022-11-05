<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloService $HelloService;

    public function __construct(HelloService $HelloService){
        $this->HelloService = $helloService;
    }
    public function hello(): string
    {
        return "hello world";
    }
}
