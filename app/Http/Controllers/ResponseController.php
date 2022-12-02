<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(): Response
    {
        return response("Halo Response");
    }

    public function header(Request $request): Response
    {
        $body = [
            'nama_awal' => 'Irfan',
            'nama_akhir' => 'Machmud'
        ];

        return response(json_encode($body), 200)
            ->header('tentang' , 'belajar laravel dasar')
            ->withHeaders([
                'author' => 'Irfan em',
                'App' => 'cuma belajar'
            ]);
    }
}
