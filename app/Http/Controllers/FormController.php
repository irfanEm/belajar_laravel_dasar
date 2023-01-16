<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function form(): Response
    {
        return response()->view('form');
    }

    public function formAction(Request $request): Response
    {
        $nama = $request->input('nama');
        return response()->view('halo', [
            "nama" => $nama
        ]);
    }
}
