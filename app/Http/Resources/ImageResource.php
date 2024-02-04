<?php

namespace App\Http\Resources;

use Ark4ne\JsonApi\Resources\JsonApiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use TiMacDonald\JsonApi\Link;

class ImageResource extends JsonApiResource
{

    protected function toAttributes(Request $request): iterable
    {
        return [
            'image' => env('APP_URL').Storage::url("images/{$this->image}"),
        ];
    }
}
