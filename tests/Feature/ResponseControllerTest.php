<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
    $this->get('/response/halo')
        ->assertStatus(200)
        ->assertSeeText("Halo Response");
    }

    public function testHeader()
    {
        $this->get('/response/header')
            ->assertStatus(200)
            ->assertSeeText("Irfan")->assertSeeText("Machmud")
            ->assertHeader('tentang', 'belajar laravel dasar')
            ->assertHeader('author', 'Irfan em')
            ->assertHeader('App', 'cuma belajar');
    }
}
