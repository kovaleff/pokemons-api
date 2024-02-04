<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Http\Resources\AreaResource;
use App\Models\Area;
use Spatie\QueryBuilder\QueryBuilder;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas =  Area::with('locations')->paginate();
        return AreaResource::collection($areas);
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        return AreaResource::make($area);
    }
}
