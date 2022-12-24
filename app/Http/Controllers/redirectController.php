<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class redirectController extends Controller
{
    public function redirectFrom(): RedirectResponse
    {
        return redirect('/redirect/to');
    }

    public function redirectTo(): string
    {
        return "Redirect To";
    }

    public function redirectNama(): RedirectResponse
    {
        return redirect()->route('redirectHalo', [
            'name' => 'Irfan'
        ]);
    }

    public function redirectAction(): RedirectResponse
    {
        return redirect()->action([redirectController::class, 'redirectHalo'], ['name' => 'Irfan']);
    }

    public function redirectHalo(string $name): string
    {
        return "Halo $name";
    }

    public function redirectDomain(): RedirectResponse
    {
        return redirect()->away('https://www.facebook.com/');
    }
}
