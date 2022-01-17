<?php

namespace Modules\Portal\Traits;

use File;

trait InteractsWithMedia
{
    private string $mediaPath = 'files';
    private array $mediableTypes = [
        \Modules\Portal\Entities\Offer::class => 'offers',
        \Modules\Portal\Entities\OfferCategory::class => 'offer_categories',
    ];

    public function getMediaUrl($media = false): string
    {
        $path = $this->mediaPath . '/' . $this->mediableTypes[get_class($this)] . '/' . $this->id;
        if ($media) {
            return asset($path) . '/' . $media->getFileName();
        }
        return public_path($path);
    }

    /**
     * @param $file
     * @return bool
     */
    public function hasMedia($file = false): bool
    {
        $path = $this->getMediaUrl();
        if (!File::isDirectory($path)) {
            return false;
        }
        $files = File::files($path);
        return (bool)count($files);
    }

    public function getMedia()
    {
        return File::files($this->getMediaUrl());
    }

    public function attachMedia($file, $filename = '')
    {
        $path = $this->getMediaUrl();
        if (!$filename) {
            $filename = $file->getClientOriginalName();
        }
        $file->move($path, $filename);
    }

    public function detachMedia()
    {
        File::deleteDirectory($this->getMediaUrl());
    }
}
