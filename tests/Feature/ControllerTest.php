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

    public function testInput2()
    {
        $this->post('input/hello/input', [
            "name" => [
            "first" => "Irfan",
            "last" => "Machmud"
            ]
        ])->assertSeeText("name")->assertSeeText("first")->assertSeeText("Irfan")->assertSeeText("last")->assertSeeText("Machmud");
    }

    public function testArray()
    {
        $this->post('input/hello/array', [
            'orang' => [
                [
                    'name' => 'Irfan Machmud',
                    'age' => '25 tahun'
                ],
                [
                    'name' => 'Balqis Farah Anabila',
                    'age' => '2 tahun'
                ],
                [
                    'name' => 'Shilvia Qurota Ayun',
                    'age' => '20 tahun'
                ]
            ]
            ])->assertSeeText("Irfan Machmud")->assertSeeText("Balqis Farah Anabila")->assertSeeText("Shilvia Qurota Ayun");
    }
}
