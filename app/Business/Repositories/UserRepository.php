<?php

namespace App\Business\Repositories;

use App\Business\Interface\UserInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository implements UserInterface
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
}
