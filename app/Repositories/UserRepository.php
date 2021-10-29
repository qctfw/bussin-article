<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function getByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function changePassword(int $id, string $hashed_password): ?bool
    {
        $user = $this->find($id);
        if (!$user)
            return null;

        $user->password = $hashed_password;
        return $user->save();
    }
}
