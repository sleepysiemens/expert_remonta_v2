<?php

namespace App\Listeners;

use App\Events\ImageUploaded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Intervention\Image\ImageManager;

class ResizeImage
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ImageUploaded $event): void
    {
        //dd($event->folder);
        //dd($event);
        $manager = new ImageManager(
            new \Intervention\Image\Drivers\Gd\Driver()
        );
        $path = $event->folder . $event->fileName;
        //dd(exif_imagetype($path));
        $mime = mime_content_type($path);
        //$image = $manager->read($event->folder . $event->fileName);
        $imageInfo = getimagesize($event->folder . $event->fileName);
        $imageWidth = $imageInfo[0];
        $imageHeight = $imageInfo[1];
        $imageRatio = round($imageWidth / $imageHeight, 2);
        //dd($imageRatio);
        // resize image instance
        //$image->resize(100, 100);
        // encode edited image
        //$encoded = $image->toJpg();

        //$image->save($event->folder . "x-100-" . $event->fileName);

        //$resizesBreakpoints = [768, 600, 450, 360];
        $resizesBreakpoints = $event->breakpoints;

        foreach($resizesBreakpoints as $breakpoint) {
            if($imageWidth <= $breakpoint) continue;
            $resizeWidth = round($imageWidth * ($breakpoint / $imageWidth));
            $resizeHeight = round($resizeWidth / $imageRatio);
            $image = $manager->read($event->folder . $event->fileName);
            $image->resize($resizeWidth, $resizeHeight);
            // если пнг, переводим в jpg
            if($mime === "image/png") $image = $image->toJpg();
            //dd($image);
            if($mime === "image/png") {
                $fileName = str_replace('.png', '.jpg', $event->fileName);
                $image->save($event->folder . "x-$breakpoint-" . $fileName);
            }
            else {
                $image->save($event->folder . "x-$breakpoint-" . $event->fileName);
            }
        }

    }
}
