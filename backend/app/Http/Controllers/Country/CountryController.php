<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CreateCountryRequestForm;
use App\Models\Country\Country;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Inertia\Inertia;

class CountryController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }

    public function index()
    {
        return Inertia::render('Countries/Index', [
            'countries' => Country::all()
        ]);
    }

    public function store(CreateCountryRequestForm $request)
    {
        $credentials = $request->validated();
        if ($credentials['flag']) {
            $credentials['flag'] = $this->uploadService->uploadFlag($credentials['flag']);
        }
        Country::query()
            ->create($credentials);

        return to_route('countries');
    }

    public function create()
    {
        return Inertia::render('Countries/Create');
    }

    public function edit(Country $country)
    {
        return Inertia::render('Keys/Edit', ['country' => $country]);
    }

    public function update(CreateCountryRequestForm $request, Country $country)
    {
        $credentials = $request->validated();

        if ($credentials['flag'] instanceof UploadedFile) {
            $credentials['flag'] = $this->uploadService->uploadFlag($credentials['flag']);
            $this->uploadService->removeFlag($country->flag);
        } else {
            $credentials['flag'] = $country->flag;
        }

        $country->update($credentials);

        return to_route('countries');
    }

    public function destroy(Country $country)
    {
        if ($country->flag) {
            $this->uploadService->removeFlag($country->flag);
        }
        $country->delete();

        return to_route('countries');
    }
}
