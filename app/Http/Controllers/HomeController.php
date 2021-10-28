<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Repositories\Contracts\ArticleRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home', [
            'articles' => $this->article_repository->getRecent(),
            'categories' => $this->category_repository->all()
        ]);
    }

    public function getByCategory(Category $category)
    {
        return view('category', [
            'articles' => $this->article_repository->getByCategory($category->id),
            'category' => $category,
        ]);
    }

    public function show(Category $category, Article $article)
    {
        abort_if($category->id != $article->category_id, 404);

        return view('article', [
            'article' => $article
        ]);
    }
}
