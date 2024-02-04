<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAbilityRequest;
use App\Http\Requests\UpdateAbilityRequest;
use App\Http\Resources\AbilityResource;
use App\Http\Resources\LocationResource;
use App\Models\Ability;
use App\Models\Pokemon;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abilities =  Ability::with('image')->paginate();
        return AbilityResource::collection($abilities);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ability $ability)
    {
        return AbilityResource::make($ability);

    }

    function byPokemon(Pokemon $pokemon)
    {
        $abilities =  $pokemon->abilities()->get();
        return AbilityResource::collection($abilities);
    }

}
