<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CategoryService implements CategoryServiceInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $category_repository;
    
    public function __construct(CategoryRepositoryInterface $category_repository)
    {
        $this->category_repository = $category_repository;
    }

    public function all()
    {
        return $this->category_repository->all();
    }

    public function create(string $name)
    {
        $slug = Str::slug($name);
        if ($this->category_repository->getBySlug($slug))
        {
            throw new HttpException(409, 'Kategori sudah ada');
        }

        return $this->category_repository->save($name, $slug);
    }

    public function update(int $id, string $name)
    {
        $slug = Str::slug($name);
        if ($this->category_repository->getBySlug($slug))
        {
            throw new HttpException(409, 'Kategori sudah ada');
        }

        return $this->category_repository->update($id, $name, $slug);
    }

    public function delete(int $id)
    {
        return $this->category_repository->delete($id);
    }
}
