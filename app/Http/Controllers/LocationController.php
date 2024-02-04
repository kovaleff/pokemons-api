<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\LocationResource;
use App\Http\Resources\PokemonResource;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $locations =  Location::with(['area', 'pokemons'])->paginate();
        $locations =  Location::with('area')->paginate();
        return LocationResource::collection($locations);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return LocationResource::make($location);
    }
}
