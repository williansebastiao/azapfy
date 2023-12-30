<?php

namespace App\Http\Controllers\Api;

use App\Business\Enum\StatusCode;
use App\Business\Services\UserService;
use App\Exceptions\UserNotFound;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validators\UserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        try {
            $userService = new UserService();
            return $userService->store($request->validated());
        } catch (\Exception $e) {
            return Response::output($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function verify(Request $request): JsonResponse
    {

        try {
            $userService = new UserService();
            return $userService->verify($request->id);
        } catch (\Exception $e) {
            return Response::output($e->getCode(), $e->getMessage());
        }
    }
}
