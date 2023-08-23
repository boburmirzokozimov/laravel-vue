<?php

namespace App\Http\Controllers\Api\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branch\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'data' => Branch::all()
                ->map(function ($branch) {
                    return [
                        'id' => $branch->id,
                        'lat' => $branch->lat,
                        'lon' => $branch->lon,
                        'address' => $branch->address,
                        'working_hours' => $branch->working_hours,
                        'contact_number' => $branch->contact_number,
                        'contact_email' => $branch->contact_email,
                        'full_address' => $branch->full_address,
                        'country_name' => [
                            'name_ru' => $branch->country->name,
                            'name_en' => $branch->country->name_official,
//                            'name_heb' => ''
                        ],
                    ];
                })
        ]);
    }
}
