<?php

namespace App\Business\Repositories;

use App\Business\Abstract\Abs;
use App\Models\User;

class UserRepository extends Abs
{

    /**
     * @param array $data
     * @return User
     */
    public function store(array $data): User
    {
        $user = new User();
        return $user->create($data);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function findByID()
    {
        // TODO: Implement findByID() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
