<?php

namespace App\Http\Controllers;

use App\Http\Resources\PokemonResource;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{

    private array $validFilters = ['location','area'];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $requestFilter = request()->get('filter')??[];
        $validFilters = array_intersect($this->validFilters, array_keys($requestFilter));
        $filters = array_intersect_key($requestFilter, array_flip($validFilters));

        $pokemons =  Pokemon::filter($filters)->paginate();
        return PokemonResource::collection($pokemons);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return PokemonResource::make($pokemon);
    }
}
