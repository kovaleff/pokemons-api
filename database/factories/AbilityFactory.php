<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Pokemon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ability>
 */
class AbilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>
            [
                'ru' => 'ru-'.fake()->word(),
                'en' => 'en-'.fake()->word()
            ],
            'image_id' => Image::inRandomOrder()->first()->id,
        ];
    }
}
