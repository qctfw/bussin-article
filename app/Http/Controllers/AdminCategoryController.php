<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * @var CategoryServiceInterface
     */
    private $category_service;

    public function __construct(CategoryServiceInterface $category_service)
    {
        $this->category_service = $category_service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.category', [
            'categories' => $this->category_service->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $success = $this->category_service->create($request->name);

        $message = ($success) ? 'Kategori berhasil ditambahkan!' : 'Kategori gagal ditambahkan.';

        return redirect(route('admin.categories.index'))->with('success', $success)->with('message', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.category-edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $success = $this->category_service->update($id, $request->name);

        $message = ($success) ? 'Kategori berhasil diubah!' : 'Kategori gagal diubah.';

        return redirect(route('admin.categories.index'))->with('success', $success)->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $success = $this->category_service->delete($id);

        $message = ($success) ? 'Kategori berhasil dihapus!' : 'Kategori gagal dihapus.';

        return redirect(route('admin.categories.index'))->with('success', $success)->with('message', $message);
    }
}
