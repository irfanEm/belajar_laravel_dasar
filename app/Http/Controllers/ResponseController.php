<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

    public function responseView(Request $request): response
    {
        return response()
            ->view('halo', ['nama' => 'Irfan']);
    }

    public function jsonResponse(Request $request): JsonResponse
    {
        $body = [
            'nama_awal' => 'Irfan',
            'nama_akhir' => 'Machmud'
        ];

        return response()
            ->json($body);
    }

    public function fileResponse(Request $request): BinaryFileResponse
    {
        return response()
            ->file(storage_path('app/public/pictures/irfan.png'));
    }

   public function fileDownloadResponse(Request $request): BinaryFileResponse
    {
        return response()
            ->download(storage_path('app/public/pictures/irfan.png'));
    }
}
