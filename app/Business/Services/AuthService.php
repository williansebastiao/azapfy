<?php

namespace App\Business\Services;

use App\Business\Enum\StatusCode;
use App\Business\Repositories\UserRepository;
use App\Exceptions\UserException;
use App\Helpers\Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * @param string $email
     * @param string $password
     * @return JsonResponse
     * @throws UserException
     */
    public function auth(string $email, string $password): JsonResponse
    {
        $query = User::where('email', $email);

        $user = $query->first();
        if (is_null($user) || !Hash::check($password, $user->password)) {
            throw new UserException('Credencial inválida', StatusCode::BAD_REQUEST);
        }

        $isActive = $query->where('active', 0)->exists();
        if($isActive) {
            throw new UserException('Usuário não verificado', StatusCode::BAD_REQUEST);
        }
        $token = $user->createToken($user->id)->plainTextToken;

        return Response::output(StatusCode::SUCCESS, 'Usuário autenticado', ['token' => $token]);
    }
}
