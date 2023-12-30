<?php

namespace App\Business\Services;

use App\Business\Enum\StatusCode;
use App\Helpers\Response;
use App\Business\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class UserService
{

    /**
     * @param array $data
     * @return UserRepository
     */
    public function store(array $data): JsonResponse
    {
        $user = new UserRepository();
        $response = $user->store($data);
        $response->sendEmailVerificationNotification();
        return Response::output(StatusCode::CREATED, 'Usuário criado com sucesso', $response);
    }

}
