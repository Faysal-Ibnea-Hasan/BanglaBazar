<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Str;

class FileUploadService
{
    protected ImageManager $imageManager;

    public function __construct()
    {
        // Initialize ImageManager with GD driver
        $this->imageManager = new ImageManager(
            new Driver()
        );
    }

    /**
     * Upload and process a file
     */
    public function upload(
        UploadedFile $file,
        string $disk = 'public',
        string $directory = 'uploads',
        array $options = []
    ): string {
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        if ($this->isImage($file)) {
            return $this->processImage($file, $filename, $disk, $directory, $options);
        }

        return $file->storeAs($directory, $filename, $disk);
    }

    /**
     * Process and optimize image
     */
    public function processImage(
        UploadedFile $file,
        string $filename,
        string $disk = 'public',
        string $directory = 'uploads',
        array $options = []
    ): string {
        // Default options
        $defaults = [
            'width' => 1200,
            'height' => null,
            'quality' => 85,
            'format' => 'jpg'
        ];

        $options = array_merge($defaults, $options);

        // Create image instance and process
        $image = $this->imageManager->read($file);

        // Resize image
        if ($options['height']) {
            $image->resize($options['width'], $options['height']);
        } else {
            $image->scale(width: $options['width']);
        }

        // Convert to format and get encoded image
        $encodedImage = match($options['format']) {
            'jpg', 'jpeg' => $image->toJpeg($options['quality']),
            'png' => $image->toPng(),
            'webp' => $image->toWebp($options['quality']),
            default => $image->toJpeg($options['quality'])
        };

        // Create full path
        $fullPath = $directory . '/' . $filename;

        // Store processed image
        Storage::disk($disk)->put(
            $fullPath,
            $encodedImage->toString()
        );

        return $fullPath;
    }

    /**
     * Create image variations with different sizes
     */
    public function createImageVariations(
        UploadedFile $file,
        array $variations,
        string $disk = 'public',
        string $directory = 'uploads'
    ): array {
        $paths = [];
        $baseFilename = Str::uuid();

        foreach ($variations as $name => $options) {
            $filename = "{$baseFilename}_{$name}.jpg";

            $paths[$name] = $this->processImage(
                $file,
                $filename,
                $disk,
                $directory,
                $options
            );
        }

        return $paths;
    }

    /**
     * Add watermark to image
     */
    public function addWatermark(
        UploadedFile $file,
        string $watermarkPath,
        string $filename,
        string $disk = 'public',
        string $directory = 'uploads',
        array $options = []
    ): string {
        // Create image instance
        $image = $this->imageManager->read($file);
        $watermark = $this->imageManager->read(Storage::disk($disk)->path($watermarkPath));

        // Position watermark at bottom right
        $image->place(
            $watermark,
            'bottom-right',
            10,
            10
        );

        // Create full path
        $fullPath = $directory . '/' . $filename;

        // Store watermarked image
        Storage::disk($disk)->put(
            $fullPath,
            $image->toJpeg(85)->toString()
        );

        return $fullPath;
    }

    /**
     * Delete a file from storage
     */
    public function delete(string $path, string $disk = 'public'): bool
    {
        return Storage::disk($disk)->delete($path);
    }

    /**
     * Check if file is an image
     */
    private function isImage(UploadedFile $file): bool
    {
        return in_array(
            strtolower($file->getClientOriginalExtension()),
            ['jpg', 'jpeg', 'png', 'gif', 'webp']
        );
    }

    /**
     * Generate URL for a stored file
     */
    public function url(string $path, string $disk = 'public'): string
    {
        return Storage::disk($disk)->url($path);
    }
}