<?php

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface ArticleServiceInterface
{
    public function paginate();
    public function create(string $title, int $category_id, string $content, string $status, UploadedFile $banner);
    public function update(int $id, string $title, int $category_id, string $content, string $status, UploadedFile $banner = null);
    public function delete(int $id);
}
