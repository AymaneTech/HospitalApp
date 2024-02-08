<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Person;

/**
 * Class ImageService.
 */
class ImageService
{
    public function store($image, Person $person)
    {
            $imageName = $this->moveImage($image);
            Image::create([
                "path" => $imageName,
                "id" => $person->id
            ]);
    }

    public function moveImage($image)
    {
        $imageName = time() . "." . $image->extension();
        $image->storeAs('public/', $imageName);
        return $imageName;
    }
}
