<?php 
namespace App\Customs;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
/**
 * 
 */
class Utilities
{
	
	public static function createThumbnails($image, $path, $format, $width, $height)
	{
		$newPath = "uploads/thumbnails/$path/".date('Y/m');
        $imageName = Str::uuid().time().$format;
        $imageToSave = $newPath.'/'.$imageName;
        if (!File::isDirectory($newPath)) {
            # create directory if it doesn't exists
            File::makeDirectory($newPath, 0777, true, true);
        } 
        $createThumbnail = Image::make($image)->resize($width, $height, function($constraint) {
            $constraint->aspectRatio();
        })->save($imageToSave);
        return $imageToSave;
	}

    public static function createFitThumbnails($image, $path, $format, $width, $height)
    {
        $newPath = "uploads/thumbnails/$path/".date('Y/m');
        $imageName = Str::uuid().time().$format;
        $imageToSave = $newPath.'/'.$imageName;
        if (!File::isDirectory($newPath)) {
            # create directory if it doesn't exists
            File::makeDirectory($newPath, 0777, true, true);
        } 
        $createThumbnail = Image::make($image)->fit($width, $height)->save($imageToSave);
        return $imageToSave;
    }
}