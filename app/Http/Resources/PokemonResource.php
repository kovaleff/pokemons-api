<?php

namespace App\Http\Resources;

use Ark4ne\JsonApi\Resources\JsonApiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PokemonResource extends JsonApiResource
{

    protected function toType(Request $request): string
    {
        return 'pokemon';
    }

    protected function toAttributes(Request $request): iterable
    {
        return [
            'name' => $this->name,
            'position' => $this->position,
            'form' => $this->form,
            'location' => $this->location,
        ];
    }

    protected function toRelationships(Request $request): iterable
    {
        return [
            'image' => ImageResource::relationship(fn() => $this->image, fn() => [
                'related' => route('images.show', $this->image->id),
            ]),
            'location' => LocationResource::relationship(fn() => $this->location, fn() => [
                'related' => route('locations.show', $this->location->id),
            ]),
            'abilities' => $this->many(AbilityResource::class)
                ->links(fn() => [
                    'related' => route('ailities_by_pokemon', $this->id)
                ])
        ];
    }

}
