<?php

namespace App\Services\Contracts;

interface CategoryServiceInterface
{
    public function all();
    public function create(string $name);
    public function update(int $id, string $name);
    public function delete(int $id);
}
