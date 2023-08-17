<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client\Client;
use App\Repositories\ClientRepository;
use App\Services\AuthService;
use App\Services\TokenService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class AuthController extends Controller
{
    public function __construct(private AuthService      $authService,
                                private TokenService     $tokenService,
                                private ClientRepository $clientRepository)
    {
    }


    /**
     * @OA\Post(
     *    path="/login",
     *    operationId="index",
     *    tags={"Auth"},
     *    summary="Login to your account",
     *    description="Get list of articles",
     *    @OA\RequestBody(
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                       type="object",
     *                       @OA\Property(
     *                           property="phone",
     *                           type="string"
     *                       ),
     *                       @OA\Property(
     *                           property="auth_key",
     *                           type="string"
     *                       ),
     *                  ),
     *                  example={
     *                      "phone":"998901234567",
     *                      "auth_key":"auth_key_example",
     *                 }
     *              )
     *          )
     * ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="access_token", type="string"),
     *             @OA\Property(property="refresh_token",type="string")
     *          )
     *       )
     *  )
     */
    public function login()
    {
        $credentials = request()->validate([
            'phone' => 'numeric|required',
            'auth_key' => 'string|required'
        ]);

        $client = Client::query()
            ->where('phone', $credentials['phone'])
            ->where('auth_key', $credentials['auth_key'])
            ->first();

        if ($client) {
            return response()->json([
                'data' => $this->authService->handleLogin($client)
            ]);
        }

        return response()->json([
            'error' => 'Invalid credentials'
        ], 401);
    }

    //TODO handle Auth Controller


    /**
     * @OA\Post(
     *    path="/refresh",
     *    operationId="refresh",
     *    tags={"Auth"},
     *    summary="refresh token",
     *    description="refresh token",
     *    security={{"api_key_security_example_access":{}}},
     *
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data",type="array",
     *                   @OA\Items(
     *                       @OA\Property(property="access_token", type="string"),
     *                       @OA\Property(property="refresh_token", type="string")
     *               )
     *          )
     *       )
     *  )
     * )
     */
    public function refresh(Request $request)
    {
        return response()->json([
            'data' => $this->tokenService->refreshTokens($request)
        ]);
    }

    /**
     * @OA\Get(
     *     path="/me",
     *     operationId="me",
     *     tags={"Auth"},
     *     summary="Personal info",
     *     security={{"api_key_security_example":{}}},
     *     @OA\Response(
     *            response=401,
     *            description="Unauthenticated",
     *        ),
     *     @OA\Response(
     *           response=200, description="Success",
     *           @OA\JsonContent(
     *              @OA\Property(property="client_id", type="string"),
     *              @OA\Property(property="status",type="boolean"),
     *              @OA\Property(property="balance",type="string"),
     *              @OA\Property(property="phone",type="string"),
     *              @OA\Property(property="cards",type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="string"),
     *                      @OA\Property(property="balance", type="string")
     *              )
     *  ),          @OA\Property(property="card_transactions",type="array",
     *                  @OA\Items(
     *                      @OA\Property(property="id", type="string"),
     *                      @OA\Property(property="sum", type="string")
     *              )
     *  ),
     *           )
     *        )
     *     ),
     *
     *
     */
    public function me(Request $request)
    {
        $client = $this->clientRepository->findByToken($request->bearerToken());

        if ($client->isActive()) {
            $credentials = [
                'client_id' => $client->id,
                'status' => $client->isActive(),
                'balance' => $client->balance,
                'phone' => $client->phone,
                'cards' => $client->creditCard()
                    ->get()
                    ->map(function ($card) {
                        return [
                            'id' => $card->id,
                            'balance' => $card->balance
                        ];
                    }),
                'card_transactions' => $client->cardTransactions()
                    ->get()
                    ->map(function ($cardTransactions) {
                        return [
                            'id' => $cardTransactions->id,
                            'sum' => $cardTransactions->sum
                        ];
                    }),
            ];
        } else {
            $credentials = [
                'client_id' => $client->id,
                'status' => $client->isActive()
            ];
        }

        return response()->json([
            'data' => $credentials
        ]);
    }
}
