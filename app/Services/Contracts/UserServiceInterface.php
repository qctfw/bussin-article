<?php

namespace App\Services\Contracts;

interface UserServiceInterface
{
    public function signin(string $email, string $password);
    public function changePassword(int $id, string $old_password, string $new_password);
}
