<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all(): Collection
    {
        return Category::all();
    }

    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

    public function count(): int
    {
        return Category::count();
    }

    public function getBySlug(string $slug): ?Category
    {
        return Category::where('slug', $slug)->first();
    }

    public function save(string $name, string $slug): bool
    {
        $category = new Category();

        $category->name = $name;
        $category->slug = $slug;

        return $category->save();
    }

    public function update(int $id, string $name, string $slug): ?bool
    {
        $category = $this->find($id);
        if (!$category)
            return null;

        $category->name = $name;
        $category->slug = $slug;

        return $category->save();
    }

    public function delete(int $id): ?bool
    {
        $category = $this->find($id);
        if (!$category)
            return null;

        return $category->delete();
    }
}
