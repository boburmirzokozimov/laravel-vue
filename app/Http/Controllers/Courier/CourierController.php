<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourierRequest;
use App\Models\Country\Country;
use App\Models\Courier\Courier;
use App\Services\CourierService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourierController extends Controller
{
    public function index()
    {
        return Inertia::render('Couriers/Index')
            ->with([
                'couriers' => Courier::query()
                    ->orderBy('id')
                    ->paginate(10)
                    ->through(fn($courier) => [
                        'id' => $courier->id,
                        'fullName' => $courier->fullName,
                        'country' => $courier->country,
                        'status' => $courier->status,
                        'phone' => $courier->phone,
                        'lastSeen' => Carbon::create($courier->last_visited)->diffForHumans(),
                    ]
                    ),
                'countries' => Country::where('id', '>', 250)->get()
            ]);
    }

    public function store(CourierRequest $request)
    {
        CourierService::create($request->validated());
    }

    public function status(Request $request, Courier $courier)
    {
        $status = $request->validate([
            'status' => 'in:active,inactive,blocked|required',
        ]);
        $courier->update($status);
        return back();
    }

    public function update(CourierRequest $request, Courier $courier)
    {
        CourierService::update($request->validated(), $courier);
        return back();
    }

    public function destroy(Courier $courier)
    {
        CourierService::delete($courier);
        return back();
    }
}
