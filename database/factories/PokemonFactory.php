<?php

namespace Database\Factories;

use App\Models\Ability;
use App\Models\Image;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pokemon>
 */
class PokemonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->unique(true)->word,
            'position' => fake()->numberBetween(1,100),
            'form' => fake()->randomElement(['head','head_legs','fins','wings']),

            'image_id' => Image::inRandomOrder()->first()->id,
            'location_id' => Location::inRandomOrder()->limit(1)->first()->id,
        ];
    }
}
