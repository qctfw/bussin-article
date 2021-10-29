<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    public function find(int $id): ?User;
    public function getByEmail(string $email): ?User;
    public function changePassword(int $id, string $hashed_password): ?bool;
}
