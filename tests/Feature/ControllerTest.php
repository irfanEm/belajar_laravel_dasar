<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllerTest extends TestCase
{

    public function testController()
    {
        $this->get('/controller/hello/Irfan')
            ->assertSeeText('halo Irfan');
    }

    public function testRequest()
    {
        $this->get("/controller/hello/request", [
            "Accept" => "plain/text"
            ])->assertSeeText("controller/hello/request")
            ->assertSeeText("http://localhost/controller/hello/request")
            ->assertSeeText("GET")
            ->assertSeeText("plain/text");
    }

    public function testInput()
    {
        $this->get('/input/hello?name=Irfan')->assertSeeText("halo Irfan");
        $this->post('/input/hello', ['name'=>'Irfan'])->assertSeeText("halo Irfan");

    }

    public function testNested()
    {
        $this->post('input/hello/first', [
            'name'=>[
                'first' => 'Irfan',
                'last' => 'Machmud'
            ]])->assertSeeText("halo Irfan");
    }
}
