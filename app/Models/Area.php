<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Area extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function pokemons(): HasManyThrough
    {
        return $this->hasManyThrough(Pokemon::class, Location::class);
    }
}
