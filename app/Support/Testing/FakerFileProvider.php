<?php

namespace App\Support\Testing;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;

class FakerFileProvider extends Base
{
    
    public function fixturesFile(string $fixturesDirPath, string $storageDir):string
    {
        $storage = Storage::disk('files');
        if(!$storage->exists($storageDir)) {
            $storage->makeDirectory($storageDir); 
        }

        $file = $this->generator->file(
            base_path("tests/Fixtures/$fixturesDirPath"),
            $storage->path($storageDir),
            false
        );

        return '/storage/files/' . trim($storageDir, '/') . '/' . $file;
    }
}
