<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Imagick;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }
    public function upload(Request $request) {
        $request->validate([
            'image' => 'required|image|max:2048' // Validation rules for upload
        ]);
    
        // Retrieve the uploaded image file
        $image = $request->file('image');
    
        // Generate a unique file name for the image
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
    
        // Store the original image
        $path = $image->storeAs('uploads', $fileName);
    
        // Optionally use Intervention Image for image manipulation
        if (class_exists('Intervention\Image\Facades\Image')) {
            // Generate thumbnail path
            $thumbnailPath = 'thumbnails/' . $fileName;
    
            // Resize and save thumbnail
            Image::make($image->getRealPath())
                ->fit(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(storage_path('app/' . $thumbnailPath));
        } else {
            // Use pure Imagick for image manipulation as an alternative
            $imagick = new Imagick(storage_path('app/uploads/' . $fileName));
            $imagick->resizeImage(200, 200, Imagick::FILTER_TRIANGLE, 1);
            $imagick->writeImage(storage_path('app/thumbnails/' . $fileName));
        }
    
        // Optionally, update your Image model to store original and thumbnail paths
        // Assuming you have an Image model with 'original_path' and 'thumbnail_path' attributes
        // $imageModel = new Image();
        // $imageModel->original_path = $path;
        // $imageModel->thumbnail_path = $thumbnailPath;
        // $imageModel->save();
    
        // Redirect back with success message
        return redirect()->route('gallery.index')->with('success', 'Image uploaded successfully.');
    }
    
}
