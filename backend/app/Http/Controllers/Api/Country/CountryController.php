<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Controller;
use App\Models\Country\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        dd();
        return response()->json([
            'data' => Country::all()->where('id', '>', 250)
                ->map(function ($country) {
                    return [
                        'id' => $country->id,
                        'name_ru' => $country->name,
                        'name_en' => $country->name_common,
                        'name_he' => $country->name_official,
                        'flag' => '/storage/' . $country->flag,
                    ];
                })
        ]);
    }
}
