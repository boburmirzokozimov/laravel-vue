<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\CreateBranchRequestForm;
use App\Http\Requests\Branch\UpdateBranchRequestForm;
use App\Models\Branch\Branch;
use App\Models\Country\Country;
use App\Services\UploadService;
use Illuminate\Http\UploadedFile;
use Inertia\Inertia;

class BranchController extends Controller
{
    public function __construct(private UploadService $uploadService)
    {
    }

    public function index()
    {
        return Inertia::render('Branches/Index', [
            'branches' => Branch::query()
                ->paginate(10)
        ]);
    }

    public function show(Branch $branch)
    {
        return Inertia::render('Branches/Show', [
            'branch' => Branch::with('country')->where('id', $branch->id)->first()
        ]);
    }

    public function edit(Branch $branch)
    {
        return Inertia::render('Branches/Edit', [
            'branch' => $branch
        ]);
    }

    public function store(CreateBranchRequestForm $request)
    {
        $credentials = $request->validated();

        if (!is_null($credentials['photo'])) {
            $credentials['photo'] = $this->uploadService->uploadByPath(file: $credentials['photo'], path: 'branches');
        }
        Branch::query()->create($credentials);

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
        $credentials = $request->validated();

        if ($credentials['photo'] instanceof UploadedFile) {
            if ($branch->photo) {
                $this->uploadService->remove($branch->photo);
            }
            $credentials['photo'] = $this->uploadService->uploadByPath(file: $credentials['photo'], path: 'branches');
        }

        $branch->update($credentials);

        return to_route('branches');
    }
}
