<?php

namespace App\Http\Controllers\Api\Country;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Country\CountryCollection;
use App\Models\Country\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        return new CountryCollection(Country::all()->where('id', '>', 250));
    }
}
