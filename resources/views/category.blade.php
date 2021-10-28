<x-app-layout>
    <x-slot name="title">{{ $category->name }}</x-slot>

    <main class="flex flex-row p-6 justify-between">
        <div class="flex flex-col gap-4">
            <h2 class="text-xl font-semibold">Kategori: {{ $category->name }}</h2>
            <div class="grid grid-cols-2 gap-5">
                @forelse ($articles as $article)
                <x-article-preview banner="{{ $article->banner }}" title="{{ $article->title }}" paragraph="{{ $article->content }}" link="{{ $article->link }}" />
                @empty
                <div class="text-md italic">Tidak ada artikel.</div>
                @endforelse
            </div>
            {{ $articles->links() }}
        </div>
    </main>
</x-app-layout>