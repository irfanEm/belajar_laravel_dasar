<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input('name');
        return "halo $name";
    }

    public function helloNested(Request $request): string
    {
        $firstname = $request->input('name.first');
        return "halo $firstname";
    }
    public function helloNested2(Request $request): string
    {
        $firstname = $request->input('name.last');
        return "halo $firstname";
    }
    public function helloInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function helloArray(Request $request): string
    {
        $names = $request->input("orang.*.name");
        return json_encode($names);
    }

    public function inputType(Request $request): string
    {
        $name = $request->input("name");
        $menikah = $request->boolean("menikah");
        $tanggalLahir = $request->date("tanggal_lahir", "Y-m-d");

        return json_encode([
            "nama" => $name,
            "status" => $menikah,
            "tanggal Lahir" => $tanggalLahir->format("Y-m-d")
        ]);
    }
}
