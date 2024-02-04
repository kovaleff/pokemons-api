<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\Location;
use App\Models\Pokemon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\UniqueConstraintViolationException;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(0, 10) as $i) {
            repeat:
            try {
                Pokemon::factory()->create();
            } catch (UniqueConstraintViolationException $e){
                goto repeat;
            }
        }
        foreach(Pokemon::all() as $pokemon){
            $abilities = Ability::all();
            foreach ($abilities as $ability){
                $ability->pokemon_id = Pokemon::inRandomOrder()->first()->id;
                $ability->save();
            }
        }
    }
}
