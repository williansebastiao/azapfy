<?php

namespace App\Business\Services;

use App\Business\Enum\StatusCode;
use App\Exceptions\UserNotFound;
use App\Helpers\Response;
use App\Business\Repositories\UserRepository;
use Illuminate\Auth\Events\Verified;
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

    /**
     * @param int $id
     * @return JsonResponse
     * @throws UserNotFound
     */
    public function verify(int $id): JsonResponse
    {
        $userRepository = new UserRepository();
        $user = $userRepository->findByID($id);

        if (is_null($user)) {
            throw new UserNotFound('Usuário não encontrado', StatusCode::BAD_REQUEST);
        }

        if ($user->hasVerifiedEmail()) {
            return Response::output(StatusCode::SUCCESS, 'Este e-mail já foi verificado');
        }
        if ($user->markEmailAsVerified()) {
            $arr = ['active' => 1];
            $userRepository->update($id, $arr);
            event(new Verified($user));
        }

        return Response::output(StatusCode::SUCCESS, 'E-mail verificado');
    }

}
