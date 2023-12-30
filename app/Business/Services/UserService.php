<?php

namespace App\Business\Services;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserService
{

    public function __construct()
    {

    }

    public function store(array $data)
    {
        $user = User::create($data);
        $user->sendEmailVerificationNotification();
        return $user;
    }

}
