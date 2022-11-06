<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HelloService;

class HelloController extends Controller
{
    private HelloService $HelloService;

    public function __construct(HelloService $HelloService){
        $this->HelloService = $helloService;
    }
    public function hello(Request $request, string $name): string
    {
        return $this->HelloService->hello($name);
    }
}
