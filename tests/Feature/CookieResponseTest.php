<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieResponseTest extends TestCase
{
    public function testCookieResponse()
    {
        $this->get('/cookie/set')
            ->assertSeeText("Halo Cookie")
            ->assertCookie("Nama", "Irfan")
            ->assertCookie("Isuser", "true");
    }

    public function testGetCookie()
    {
        $this->withCookie('Nama', 'Irfan')
            ->withCookie('Isuser', 'true')
            ->get('/cookie/get')
            ->assertJson([
                'Nama' => 'Irfan',
                'Isuser' => 'true',
            ]);
    }
}


