<?php

namespace App\Services;

use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Services\Contracts\ArticleServiceInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ArticleService implements ArticleServiceInterface
{
    /**
     * @var ArticleRepositoryInterface
     */
    private $article_repository;

    public function __construct(ArticleRepositoryInterface $article_repository)
    {
        $this->article_repository = $article_repository;
    }

    public function paginate()
    {
        return $this->article_repository->paginate();
    }

    public function create(string $title, int $category_id, string $content, string $status, UploadedFile $banner)
    {
        $slug = Str::slug($title);
        if ($this->article_repository->getBySlug($slug)) {
            throw new HttpException(409, 'Artikel sudah ada');
        }

        $banner_path = $banner->storeAs('public/banners', $slug . '-' . now()->timestamp . '.' . $banner->getClientOriginalExtension());

        $published_at = ($status == 'publish') ? now() : null;

        return $this->article_repository->save($title, $slug, $category_id, $content, $banner_path, $published_at);
    }

    public function update(int $id, string $title, int $category_id, string $content, string $status, UploadedFile $banner = null)
    {
        $slug = Str::slug($title);

        $check = $this->article_repository->getBySlug($slug);
        if ($check && $check->id != $id) {
            throw new HttpException(409, 'Artikel sudah ada');
        }

        $banner_path = (!is_null($banner)) ? $banner->storeAs('public/banners', $slug . '-' . now()->timestamp . '.' . $banner->getClientOriginalExtension()) : '';

        $published_at = ($status == 'publish') ? now() : null;

        return $this->article_repository->update($id, $title, $slug, $category_id, $content, $banner_path, $published_at);
    }

    public function delete(int $id)
    {
        return $this->article_repository->delete($id);
    }
}
