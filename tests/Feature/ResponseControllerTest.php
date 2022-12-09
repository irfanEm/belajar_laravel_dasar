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

    public function testresponseview()
    {
        $this->get('/response/view')
            ->assertSeeText('halo Irfan');
    }

    public function testresponseJson()
    {
        $this->get('/response/json')
            ->assertJson(['nama_awal' => 'Irfan', 'nama_akhir'=> 'Machmud']);
    }

    public function testresponseFile()
    {
        $this->get('/response/file')
            ->assertHeader('Content-Type', 'image/png');
    }

    public function testresponseDownload()
    {
        $this->get('/response/download')
            ->assertDownload('irfan.png');
    }


}
