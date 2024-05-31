<?php

namespace App\Services;

use App\Models\File;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CloudinaryService
{
    /**
     * Upload File To Cloudinary
     *
     * @param $file
     * @param $folder
     * @return array
     */
    public function uploadFileToCloudinary($file, $folder): array
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

    /**
     * Create Thumbnail
     *
     * @param $file
     */
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

    /**
     * Delete Multiple Files
     *
     * @param $files
     * @return void
     */
    public function deleteFiles($files)
    {
        foreach ($files as $file) {
            Cloudinary::destroy($file->publicId);
            $file->delete();
        }
    }


    /**
     * Update Multiple Files
     *
     * @param $existingFiles
     * @param $oldRequestData
     * @param $imageRequestData
     * @param $id
     * @param $folder
     * @return void
     */
    public function processFiles($existingFiles, $oldRequestData, $imageRequestData, $id, $folder)
    {
        foreach ($oldRequestData as $index => $oldRequestItem) {
            if ($oldRequestItem === null && isset($existingFiles[$index])) {
                $this->deleteFile($existingFiles[$index]);

            } else if ($oldRequestItem !== null && !isset($existingFiles[$index]) && isset($imageRequestData[$index])) {
                $this->createFile($imageRequestData[$index], $id, $folder);
            }
        }

        if (count($oldRequestData) > count($existingFiles)) {
            for ($i = count($existingFiles); $i < count($oldRequestData); $i++) {
                if (isset($imageRequestData[$i])) {
                    $this->createFile($imageRequestData[$i], $id, $folder);
                }
            }
        }
    }

    /**
     * Delete File
     *
     * @param $file
     * @return void
     */
    private function deleteFile($file)
    {
        Cloudinary::destroy($file->publicId);
        $file->delete();
    }

    /**
     * Create File
     *
     * @param $newFile
     * @param $id
     * @param $folder
     * @return void
     */
    private function createFile($newFile, $id, $folder)
    {
        $cloudinaryData = $this->uploadFileToCloudinary($newFile, $folder);

        File::create([
            'id_' . $folder => $id,
            'type' => $folder,
            'path' => $cloudinaryData['path'],
            'publicId' => $cloudinaryData['publicId'],
            'name' => $newFile->getClientOriginalName(),
        ]);
    }
}
