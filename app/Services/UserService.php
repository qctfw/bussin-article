<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $user_repository;

    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->user_repository = $user_repository;
    }

    public function signin(string $email, string $password)
    {
        $user = $this->user_repository->getByEmail($email);
        if (!$user)
            return null;

        return (Hash::check($password, $user->password)) ? $user : null;
    }

    public function changePassword(int $id, string $old_password, string $new_password)
    {
        $user = $this->user_repository->find($id);
        if (!$user)
            return null;

        if (!Hash::check($old_password, $user->password))
            return null;

        return $this->user_repository->changePassword($id, Hash::make($new_password));
    }
}
