<x-admin-layout>
    <x-slot name="title">Kelola Artikel</x-slot>

    <div class="flex flex-row justify-between gap-4">
        <form method="POST" action="{{ route('admin.articles.store') }}" class="flex flex-col w-1/2 gap-8 p-4 bg-gray-100 shadow-md">
            <h3 class="text-xl font-bold">Artikel Baru</h3>

            @csrf
            <div class="flex flex-col gap-2">
                <label for="article-form-title" class="font-semibold">Title <x-asterisk /></label>
                <input id="article-form-title" type="text" name="title" value="{{ old('title') }}" placeholder="Title" required="required" class="p-2 bg-gray-200 rounded shadow focus:bg-gray-300" />
                @error('title')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="article-form-category" class="font-semibold">Kategori <x-asterisk /></label>
                <select id="article-form-category" name="category" required="required" class="p-2 bg-gray-200 rounded shadow focus:bg-gray-300">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="article-form-content" class="font-semibold">Konten <x-asterisk /></label>
                <textarea id="article-form-content" name="content" required="required" rows="10" class="p-2 bg-gray-200 rounded shadow focus:bg-gray-300">{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex flex-row gap-4">
                <button type="submit" name="status" value="publish" class="px-4 py-2 font-semibold text-gray-100 transition-colors bg-blue-600 rounded-lg hover:bg-blue-800">Publikasi</button>
                <button type="submit" name="status" value="draft" class="px-3 py-1 font-semibold text-gray-100 transition-colors bg-gray-500 rounded-lg hover:bg-gray-700">Simpan ke Draft</button>
            </div>
        </form>

        <div class="flex flex-col gap-8 p-4 bg-gray-100 shadow-md w-1/2">
            <h3 class="text-xl font-bold">Data Artikel</h3>
            <table class="min-w-full divide-y divide-gray-400 table-fixed">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="p-2 text-sm font-medium tracking-wider text-left text-gray-500 uppercase w-1/8 dark:text-gray-100">
                        Title
                        </th>
                        <th scope="col" class="p-2 text-sm font-medium tracking-wider text-left text-gray-500 uppercase w-4/8 dark:text-gray-100">
                        Kategori
                        </th>
                        <th scope="col" class="relative w-1/12 p-2">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                    @forelse ($articles as $article)
                    <tr>
                        <td class="p-2">
                            <div class="flex">{{ $article->title }}</div>
                        </td>
                        <td class="p-2">
                            <div class="flex">{{ $article->category->name }}</div>
                        </td>
                        <td>
                            <div class="flex flex-row gap-2 px-6 py-4 text-sm font-medium">
                                <x-button-secondary link="{{ route('admin.articles.edit', $article->id) }}">Edit</x-button-secondary>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 font-semibold text-gray-100 transition-colors bg-red-500 rounded-lg hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-4 italic text-center">Tidak ada artikel.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $articles->links() }}
        </div>
    </div>
</x-admin-layout>