<?php

namespace App\Traits;

trait Gallery
{
    /**
     * Return photos.
     *
     * @return string
     */
    public function getGalleryAttribute()
    {
        
        return isset($this->images) && mb_strlen($this->images) >= 5 
                ? json_decode($this->images, true) 
                : [];

    }
}