<?php

namespace App\Http\Controllers\Api\HelpRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpRequestCreateForm;
use App\Models\HelpRequest\HelpRequest;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

class HelpRequestController extends Controller
{
    /**
     * @OA\Post(
     * path="/help-request",
     * operationId="help",
     * tags={"Help"},
     * security={{"api_key_security_example":{}}},
     * summary="Get help from operator",
     * description="Get help from operator",
     * @OA\RequestBody(
     * @OA\MediaType(
     * mediaType="application/json",
     * @OA\Schema(
     * @OA\Property(
     * type="object",
     * @OA\Property(
     * property="phone",
     * type="string"
     * ),
     * @OA\Property(
     * property="name",
     * type="string"
     * ),
     * @OA\Property(
     * property="preferred_language",
     * type="string"
     * ),
     * @OA\Property(
     * property="messenger_type",
     * type="string"
     * ),
     * ),
     *  example={
     *  "phone":"998901234567",
     *  "name":"Boburmirzo Kozimov",
     *  "preferred_language":"ENGLISH",
     *  "messenger_type":"TELEGRAM",
     *  }
     * )
     * )
     * ),
     * @OA\Response(
     * response=200, description="Success",
     * @OA\JsonContent(
     * @OA\Property(property="data", type="string"),
     * )
     * )
     * )
     */
    public function store(HelpRequestCreateForm $request): JsonResponse
    {
        $credentials = $request->validated();

        HelpRequest::query()->create($credentials);

        return response()->json([
            'data' => 'Successfully created',
        ]);
    }
}
