<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Location::factory()->count(10)->create();
        foreach (['Volcano', 'Ginnabar Gym', 'Mansion', 'Ginnabar Lab'] as $location) {
            $location = new Location([
                'name' => $location,
                'area_id' => Area::where('name','Kanto')->first()->id
            ]);
            $location->save();
        }
        $location = new Location([
            'name' => 'Other',
            'area_id' => Area::where('name','Hoenn')->first()->id
        ]);
        $location->save();
    }
}
