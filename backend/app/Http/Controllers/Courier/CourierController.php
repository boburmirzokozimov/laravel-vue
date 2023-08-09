<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourierRequest;
use App\Models\Courier\Courier;
use App\Services\CourierService;
use Inertia\Inertia;

class CourierController extends Controller
{
    public function index()
    {
        return Inertia::render('Couriers/Index')
            ->with([
                'couriers' => Courier::paginate(10)->get()
            ]);
    }

    public function store(CourierRequest $request)
    {
        CourierService::create($request->validated());
    }


    public function update(CourierRequest $request, Courier $courier)
    {
        CourierService::update($request->validated(), $courier);
    }

    public function destroy(Courier $courier)
    {
        CourierService::delete($courier);
    }
}
