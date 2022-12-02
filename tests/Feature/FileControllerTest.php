<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FileControllerTest extends TestCase
{
    public function testFileUpload()
    {
        $picture = UploadedFile::fake()->image("irfan.png");
        $this->post('/file/upload',[
            "picture" => $picture
        ])->assertSeeText("OK irfan.png");
    }
}
