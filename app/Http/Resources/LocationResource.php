<?php

namespace App\Http\Resources;

use Ark4ne\JsonApi\Resources\JsonApiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonApiResource
{
    protected function toAttributes(Request $request): iterable
    {
        return [
            'name' => $this->name,
        ];
    }

    protected function toRelationships(Request $request): iterable
    {
        return [
            'area' => AreaResource::relationship(fn() => $this->area, fn() => [
                'related' => route('areas.show', $this->area->id),
            ])
        ];
    }
}
