<x-admin-layout>
    <x-slot name="title">Edit Artikel {{ $article->title }}</x-slot>

    <form method="POST" action="{{ route('admin.articles.update', $article->id) }}" class="flex flex-col p-4 bg-gray-100 shadow-md gap-8">
        <h3 class="text-xl font-bold">Edit Artikel</h3>
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $article->id }}" />
        <div class="flex flex-col gap-2">
            <label for="article-form-title" class="font-semibold">Title <x-asterisk /></label>
            <input id="article-form-title" type="text" name="title" value="{{ $article->title }}" placeholder="Title" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow" />
            @error('title')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="article-form-category" class="font-semibold">Kategori <x-asterisk /></label>
            <select id="article-form-category" name="category" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ ($category->id === $article->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="article-form-content" class="font-semibold">Konten <x-asterisk /></label>
            <textarea id="article-form-content" name="content" required="required" rows="10" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow">{{ $article->content }}</textarea>
            @error('content')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-row gap-4">
            <button type="submit" name="status" value="publish" class="px-4 py-2 font-semibold text-gray-100 transition-colors bg-blue-600 rounded-lg hover:bg-blue-800">Publikasi</button>
            <button type="submit" name="status" value="draft" class="px-3 py-1 font-semibold text-gray-100 transition-colors bg-gray-500 rounded-lg hover:bg-gray-700">Simpan ke Draft</button>
        </div>
    </form>
</x-admin-layout>