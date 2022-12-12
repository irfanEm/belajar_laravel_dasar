<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Testing\Assert;
use Tests\TestCase;

class EncryptionTest extends TestCase
{
    public function testEncryption()
    {
        $encypt = Crypt::encrypt('Irfan machmud');
        var_dump($encypt);

        $decrypt = Crypt::decrypt($encypt);
        self::assertEquals('Irfan machmud', $decrypt);
    }
}
