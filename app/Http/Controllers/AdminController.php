<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * @var ArticleRepositoryInterface
     */
    private $article_repository;
    
    /**
     * @var CategoryRepositoryInterface
     */
    private $category_repository;

    public function __construct(ArticleRepositoryInterface $article_repository, CategoryRepositoryInterface $category_repository)
    {
        $this->article_repository = $article_repository;
        $this->category_repository = $category_repository;
    }

    public function index()
    {
        return view('admin.dashboard', [
            'article_count' => $this->article_repository->count(),
            'category_count' => $this->category_repository->count()
        ]);
    }
}
