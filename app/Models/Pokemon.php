<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Pokemon extends Model
{
//    use FilterQueryString;
    use HasFactory;

    protected array $filters = ['sort', 'by_location', 'by_area'];
    public $timestamps = false;
    public $table = 'pokemons';

    protected $fillable = [
        'name',
        'position',
        'form',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function abilities(): HasMany
    {
        return $this->hasMany(Ability::class);
    }

    public function scopeFilter(Builder $query, $filters)
    {
        if (count($filters)) {
            foreach ($filters as $key => $filter) {
                try {
                    call_user_func_array([$this, "by_{$key}"], [$query, $filter]);
                } catch (\Exception $e) {

                }
            }
        }
    }

    public function by_location(Builder $query, $value)
    {
        return $query->whereHas('location', function ($q) use ($value) {
            $q->where('name', $value);
        });
    }

    public function by_area(Builder $query, $value)
    {
        $area_id = Area::where('name', $value)->first()->id ?? 0;
        return $query->whereHas('location', function ($q) use ($value, $area_id) {
            $q->where('area_id', $area_id);
        });
    }
}
