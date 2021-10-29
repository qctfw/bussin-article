<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Services\Contracts\ArticleServiceInterface;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    /**
     * @var ArticleServiceInterface
     */
    private $article_service;

    /**
     * @var CategoryServiceInterface
     */
    private $category_service;

    public function __construct(ArticleServiceInterface $article_service, CategoryServiceInterface $category_service)
    {
        $this->article_service = $article_service;
        $this->category_service = $category_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article', [
            'articles' => $this->article_service->paginate(),
            'categories' => $this->category_service->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleCreateRequest $request)
    {
        $success = $this->article_service->create($request->title, $request->category, $request->content, $request->status, $request->file('banner'));

        $message = ($success) ? 'Artikel berhasil ditambahkan!' : 'Artikel gagal ditambahkan.';

        return redirect(route('admin.articles.index'))->with('success', $success)->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.article-edit', [
            'article' => $article,
            'categories' => $this->category_service->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, $id)
    {
        $success = $this->article_service->update($id, $request->title, $request->category, $request->content, $request->status, $request->file('banner'));

        $message = ($success) ? 'Artikel berhasil diubah!' : 'Artikel gagal diubah.';

        return redirect(route('admin.articles.index'))->with('success', $success)->with('message', $message);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = $this->article_service->delete($id);

        $message = ($success) ? 'Artikel berhasil dihapus!' : 'Artikel gagal dihapus.';

        return redirect(route('admin.articles.index'))->with('success', $success)->with('message', $message);
    }
}
