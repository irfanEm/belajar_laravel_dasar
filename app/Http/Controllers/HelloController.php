<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HelloService;

class HelloController extends Controller
{
    private HelloService $HelloService;

    public function __construct(HelloService $HelloService){
        $this->HelloService = $HelloService;
    }
    public function hello(Request $request, string $name): string
    {
        // $request->path();
        // $request->url();
        // $request->fullUrl();
        return $this->HelloService->hello($name);
    }

    public function request(Request $request): string
    {
        return $request->path() . PHP_EOL .
            $request->url() . PHP_EOL .
            $request->fullUrl() . PHP_EOL .
            $request->method() . PHP_EOL .
            $request->header('Accept') . PHP_EOL;
    }
}
