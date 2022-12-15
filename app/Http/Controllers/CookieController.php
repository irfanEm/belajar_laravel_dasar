<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function Cookieset(): Response
    {
        return response("Halo Cookie")
            ->cookie("Nama", "Irfan", 1000, "/")
            ->cookie("Isuser", "true", 1000, "/");
    }
}
