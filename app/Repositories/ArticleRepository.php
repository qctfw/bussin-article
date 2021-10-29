<?php

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use Carbon\Carbon;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function count()
    {
        return Article::count();
    }

    public function find(int $id)
    {
        return Article::find($id);
    }

    public function getByCategory(int $category_id, bool $published = true, int $per_page = 10)
    {
        $query = Article::with('category')->where('category_id', $category_id);

        if ($published) {
            $query = $query->published();
        }

        return $query->paginate($per_page);
    }

    public function getBySlug(string $slug)
    {
        return Article::where('slug', $slug)->first();
    }

    public function getRecent(int $count = 5, bool $published = true)
    {
        $query = Article::with('category');
        $query = ($published) ? $query->published()->orderByDesc('published_at') : $query->orderByDesc('created_at');

        return $query->limit($count)->get();
    }

    public function paginate(int $per_page = 10, array $filters = [], string $sort = '')
    {
        $query = Article::with('category');

        foreach ($filters as $key => $value) {
            $query = $query->where($key, $value);
        }

        if (!empty($sort)) {
            $query = (substr($sort, 0, 1) == '-') ? $query->orderByDesc(substr($sort, 1)) : $query->orderBy($sort);
        }

        return $query->paginate($per_page);
    }

    public function save(string $title, string $slug, string $category_id, string $content, string $banner, Carbon $published_at = null): bool
    {
        $article = new Article();

        $article->title = $title;
        $article->slug = $slug;
        $article->category_id = $category_id;
        $article->content = $content;
        $article->banner = $banner;
        $article->published_at = $published_at;

        return $article->save();
    }

    public function update(int $id, string $title, string $slug, string $category_id, string $content, string $banner = '', ?Carbon $published_at = null): ?bool
    {
        $article = $this->find($id);
        if (!$article)
            return null;

        $article->title = $title;
        $article->slug = $slug;
        $article->category_id = $category_id;
        $article->content = $content;
        $article->published_at = $published_at;

        if ($banner != '')
            $article->banner = $banner;

        return $article->save();
    }

    public function delete(int $id): ?bool
    {
        $article = $this->find($id);
        if (!$article)
            return null;

        return $article->delete();
    }
}
