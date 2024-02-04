<?php

namespace App\Http\Resources;

use Ark4ne\JsonApi\Resources\JsonApiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonApiResource
{
    protected function toAttributes(Request $request): iterable
    {
        return [
            'name' => $this->name,
        ];
    }
}
