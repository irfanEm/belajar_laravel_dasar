<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{

    public function testGet(){
        $this->get('/hello')
            ->assertStatus(200)
            ->assertSeeText('world');
    }

    public function testFallback(){
        $this->get('/fuck')
            ->assertSeeText('404 Not Found by Irfan Em');
    }

    public function testView()
    {
        $this->get('/halo')
            ->assertSeeText('halo irfan machmud');
        $this->get('/halo2')
            ->assertSeeText('halo irfan Machmud');
    }

    public function testNested()
    {

        $this->get('/halo3')
            ->assertSeeText('halo irfan Machmud');
    }

    public function testTemplate()
    {
        $this->view('halo', ['nama'=>'Irfan Machmud'])
        ->assertSeeText('halo Irfan Machmud');

        $this->view('halo.dunia', ['nama'=>'IrfaN Machmud'])
        ->assertSeeText('halo IrfaN Machmud');
    }

    public function testParametersRoute()
    {
        $this->get('/produk/2')
            ->assertSeeText('Produk : 2');

        $this->get('/irfan/machmud/machmud/irfan')
            ->assertSeeText("nama akhir : machmud, nama awal : irfan");
    }

    public function testRegex()
    {
        $this->get('/item/2345')
            ->assertSeeText('item : 2345');
    }

    public function testRouteParameterOptional()
    {
        $this->get('/produk/124')
            ->assertSeeText('produk id: 124');

        $this->get('/produk/')
            ->assertSeeText('produk id: 27');
    }

    public function testConflictRoute()
    {
        $this->get('/conflict/gembul')
            ->assertSeeText('nama gembul');

         $this->get('/conflict/machmud')
            ->assertSeeText('nama irfan machmud');
    }

}
