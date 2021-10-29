<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Category;
    public function count(): int;
    public function getBySlug(string $slug): ?Category;
    public function save(string $name, string $slug): bool;
    public function update(int $id, string $name, string $slug): ?bool;
    public function delete(int $id): ?bool;
}
