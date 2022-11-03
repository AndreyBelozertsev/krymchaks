<?php

namespace App\Support\Testing;

use Faker\Provider\Base;
use Illuminate\Support\Facades\Storage;

class FakerFileProvider extends Base
{
    
    public function fixturesFile(string $fixturesDirPath, string $storageDir):string
    {
        if(!Storage::exists($storageDir)) {
            Storage::makeDirectory($storageDir); 
        }

        $file = $this->generator->file(
            base_path("tests/Fixtures/$fixturesDirPath"),
            Storage::path($storageDir),
            false
        );

        return '/storage/' . trim($storageDir, '/') . '/' . $file;
    }
}
