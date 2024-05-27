<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CloudinaryService
{
    public function uploadFileToCloudinary($file, $folder)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            $cloudinary = $file->storeOnCloudinary($folder);

        } else {
            $cloudinary = Cloudinary::uploadFile($file, ['folder' => $folder]);
        }
        $cloudinaryFile = $cloudinary->getSecurePath();
        $publicId = $cloudinary->getPublicId();

        return [
            'path' => $cloudinaryFile,
            'publicId' => $publicId,
        ];
    }

    public function createThumbnail($file)
    {
        $directory = public_path('thumbnail');

        $imagick = new \Imagick();
        $imagick->readImage($file->getRealPath() . '[0]');
        $imagick->setImageFormat('jpeg');
        $imagick->writeImage($directory . '/thumbnail.jpeg');

        $url = public_path('thumbnail/thumbnail.jpeg');

        return $url;
    }
}
