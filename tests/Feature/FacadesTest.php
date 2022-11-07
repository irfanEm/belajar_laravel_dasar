<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacadesTest extends TestCase
{
    public function testFacadesConfig()
    {
        var_dump(Config::all());
    }
}
