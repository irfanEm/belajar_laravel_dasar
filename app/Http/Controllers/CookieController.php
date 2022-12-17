<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CookieController extends Controller
{
    public function Cookieset(): Response
    {
        return response("Halo Cookie")
            ->cookie("Nama", "Irfan", 1000, "/")
            ->cookie("Isuser", "true", 1000, "/");
    }

    public function getCookie(Request $request): JsonResponse
    {
        return Response()
            ->json([
                'Nama' => $request->cookie('Nama'),
                'Isuser' => $request->cookie('Isuser')
            ]);
    }

}
