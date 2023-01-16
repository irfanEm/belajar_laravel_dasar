<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{
    public function testMiddleware()
    {
        $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText("Akses Ditolak");
    }

    public function testMiddlewareWithHeader()
    {
        $this->withHeader('X-API-Key', 'Irfan')
            ->get('/middleware/api')
            ->assertStatus(200)
            ->assertSeeText("ok");
    }

    public function testMiddlewaregrup()
    {
        $this->get('/middleware/grup')
            ->assertStatus(401)
            ->assertSeeText("Akses Ditolak");
    }

    public function testMiddlewareWithHeadergrup()
    {
        $this->withHeader('X-API-Key', 'Irfan')
            ->get('/middleware/grup')
            ->assertStatus(200)
            ->assertSeeText("grup");
    }
}
