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

    public function testInputType()
    {
        $this->post('input/type',[
            "name" => "Irfan Machmud",
            "menikah" => "true",
            "tanggal_lahir" => "1997-11-27"
        ])->assertSeeText("Irfan Machmud")->assertSeeText("true")->assertSeeText("1997-11-27");
    }

    public function testInputFilterOnly()
    {
        $this->post('input/filter/only', [
            "name" => [
                "first" => "Balqis",
                "midle" => "Farah",
                "last" => "Anabila"
            ]
        ])->assertSeeText("Balqis")->assertSeeText("Anabila")->assertDontSeeText("Farah");
    }

    public function testFilterInputExcept()
    {
        $this->post('input/filter/except',[
            "username" => "Irfan Machmud",
            "admin" => "true",
            "password" => "rahasia"
        ])->assertSeeText("Irfan Machmud")->assertSeeText("rahasia")->assertDontSeeText("admin");
    }

    public function testFilterInputMerge()
    {
        $this->post('input/filter/merge',[
            "username" => "Irfan Machmud",
            "admin" => "true",
            "password" => "rahasia"
        ])->assertSeeText("Irfan Machmud")->assertSeeText("admin")->assertSeeText("false")->assertSeeText("rahasia");
    }
}

