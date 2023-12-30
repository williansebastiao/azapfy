<?php

namespace App\Business\Repositories;

use App\Business\Abstract\Abs;
use App\Models\User;
use http\Message\Body;

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

    /**
     * @param int $id
     * @return User|null
     */
    public function findByID(int $id): User|null
    {
        return User::find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return User::find($id)->update($data);
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
