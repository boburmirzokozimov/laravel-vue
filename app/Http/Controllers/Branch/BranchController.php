<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\CreateBranchRequestForm;
use App\Http\Requests\Branch\UpdateBranchRequestForm;
use App\Models\Branch\Branch;
use App\Models\Country\Country;
use Inertia\Inertia;

class BranchController extends Controller
{
    public function index()
    {
        return Inertia::render('Branches/Index', [
            'branches' => Branch::query()
                ->paginate(10)
        ]);
    }

    public function store(CreateBranchRequestForm $request)
    {
        Branch::query()->create($request->validated());

        return to_route('branches');
    }

    public function create()
    {
        return Inertia::render('Branches/Create', [
            'countries' => Country::all('id', 'name')->where('id', '>', 250)
        ]);
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return to_route('branches');
    }

    public function update(UpdateBranchRequestForm $request, Branch $branch)
    {
        $branch->update($request->validated());

        return to_route('branches');
    }
}
