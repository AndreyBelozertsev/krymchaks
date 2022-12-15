<?php

namespace App\Traits;

trait Files
{
    /**
     * Return photos.
     *
     * @return string
     */
    public function getFilesProcessedAttribute()
    {
        
        return isset($this->files) && mb_strlen($this->files) >= 5 
                ? json_decode($this->files, true) 
                : [];

    }
}