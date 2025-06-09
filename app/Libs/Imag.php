<?php

namespace App\Libs;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Imag
{
    public function url($path = null, $directory = '/', $resize = null)
    {
        if ($path != null) {
            $filename = time() . '.jpg';
            $manager = new ImageManager(Driver::class);
                $image =$manager->read($path);
                $image->resize(300, 200);
                $image->save(storage_path('app/public/uploads').$directory . $filename);
            return $filename;
        } else {
            return false;
        }
    }
}
