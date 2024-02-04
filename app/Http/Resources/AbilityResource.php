<?php

namespace App\Http\Resources;

use Ark4ne\JsonApi\Resources\JsonApiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AbilityResource extends JsonApiResource
{


    protected function toAttributes(Request $request): iterable
    {
        return [
            'name' => [
                'name-en' => $this->getTranslation('name', 'en'),
                'name-ru' => $this->getTranslation('name', 'ru'),
            ],
        ];
    }

    protected function toRelationships(Request $request): iterable
    {
        return [
            'image' => ImageResource::relationship(fn() => $this->image, fn() => [
                'related' => route('images.show', $this->image->id),
            ]),
        ];
    }
}
