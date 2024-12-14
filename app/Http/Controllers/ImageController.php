<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image as InterventionImage;


class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image', // Validate each file as an image and limit size to 5MB
        ]);

        $uploadedFiles = [];
        logger($request->all());
        $tag = $request->input('tag', 'ceremony');
        try {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    // Load the image using Intervention
                    $image = InterventionImage::imagick()->read($file->getRealPath());
                    // Resize the image while maintaining the aspect ratio
                    $image->scaleDown(width: 800);

                    // Reduce the image quality to save space
                    $compressedImage = $image->toJpeg(50);

                    $path = 'uploads/' . uniqid() . '.jpg';

                    Storage::disk('public')->put($path, $compressedImage);

                    Image::create([
                        'event_id' => 1,
                        'tag' => $tag,
                        'path' => $path
                    ]);
                    $uploadedFiles[] = $path;
                }
            }
        } catch (\Exception $e) {
            logger($e);
        }

        return response()->json(['success' => true, 'files' => $uploadedFiles]);
    }
}
