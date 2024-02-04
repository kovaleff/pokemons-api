<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images =  Image::paginate();
        return ImageResource::collection($images);
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        return ImageResource::make($image);
    }
}
