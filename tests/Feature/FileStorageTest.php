<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testFileStorage()
    {
        $filesystem = Storage::disk("local");

        $filesystem -> put ("file.txt", "Balqis Farah Anabila");

        $content = $filesystem -> get("file.txt");

        self::assertEquals("Balqis Farah Anabila", $content);
    }
}
