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
     * @return \App\Business\Repositories\UserRepository|\Illuminate\Http\JsonResponse
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

    public function verify(Request $request)
    {

        $user = User::find($request->id);

        if (is_null($user)) {
            throw new UserNotFound('Usuário não encontrado', StatusCode::BAD_REQUEST);
        }

        if ($user->hasVerifiedEmail()) {
            return Response::output(StatusCode::SUCCESS, 'Este e-mail já foi verificado');
        }
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return Response::output(StatusCode::SUCCESS, 'E-mail verificado');
    }
}
