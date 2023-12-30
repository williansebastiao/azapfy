<?php

namespace App\Http\Controllers\Api;

use App\Business\Enum\StatusCode;
use App\Business\Services\AuthService;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validators\AuthRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     * @return JsonResponse
     */
    public function auth(AuthRequest $request): JsonResponse
    {
        try {
            $authService = new AuthService();
            return $authService->auth($request['email'], $request['password']);
        } catch (\Exception $e) {
            return Response::output(StatusCode::UNPROCESSABLE_ENTITY, $e->getMessage());
        }
    }
}
