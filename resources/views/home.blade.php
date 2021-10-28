<x-app-layout>
    <x-slot name="title">Halaman Utama</x-slot>

    <main class="flex flex-row p-6 justify-between">
        <div class="flex flex-col w-3/4 gap-4">
            <h2 class="text-xl font-semibold">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 gap-5">
                @forelse ($articles as $article)
                <x-article-preview banner="{{ $article->banner }}" title="{{ $article->title }}" paragraph="{{ $article->content }}" link="{{ $article->link }}" />
                @empty
                <div class="text-md italic">Tidak ada artikel.</div>
                @endforelse
            </div>
        </div>
        <aside class="w-1/4">
            <div class="grid grid-cols-1 gap-4">
                <div class="flex flex-col gap-4">
                    <h2 class="text-xl font-semibold">Kategori</h2>
                    <div class="flex flex-wrap gap-2">
                        @forelse ($categories as $category)
                        <x-button-secondary link="{{ route('article.category', ['category' => $category->slug]) }}">{{ $category->name }}</x-button-secondary>
                        @empty
                        <div class="text-md italic">Tidak ada kategori.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </aside>
    </main>
</x-app-layout>