<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class testRedirectController extends TestCase
{
    public function testRedirect()
    {
        $this->get('/redirect/from')
        ->assertRedirect('/redirect/to');
    }

    public function testRedirectNama()
    {
        $this->get('/redirect/nama')
        ->assertRedirect('/redirect/nama/Irfan');
    }

    public function testRedirectAction()
    {
        $this->get('/redirect/action')
           ->assertRedirect('/redirect/nama/Irfan');
    }

    public function testRedirectAway()
    {
        $this->get('/redirect/away')
            ->assertRedirect('https://www.facebook.com/');
    }

}
