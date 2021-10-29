<?php

namespace App\Repositories\Contracts;

use Carbon\Carbon;

interface ArticleRepositoryInterface
{
    public function all();
    public function count();
    public function find(int $id);
    public function getByCategory(int $category_id, bool $published = true);
    public function getBySlug(string $slug);
    public function getRecent(int $count = 5, bool $published = true);
    public function paginate(int $per_page = 10, array $filters = []);
    public function save(string $title, string $slug, string $category_id, string $content, string $banner, Carbon $published_at = null): bool;
    public function update(int $id, string $title, string $slug, string $category_id, string $content, string $banner = '', Carbon $published_at = null): ?bool;
    public function delete(int $id): ?bool;
}
