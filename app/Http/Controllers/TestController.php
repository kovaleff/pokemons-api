<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Http\Resources\PokemonResource;
use App\Models\Ability;
use App\Models\Image;
use App\Models\Location;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
        $pokemon = Pokemon::find(1)->load('abilties');
        return new PokemonResource($pokemon);
    }

}
