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
        $request->path();
        $request->url();
        $request->fullUrl();
        return $this->HelloService->hello($name);
    }
}
