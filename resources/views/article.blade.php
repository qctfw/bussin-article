<x-app-layout>
    <x-slot name="title">{{ $article->title }}</x-slot>

    <article class="flex flex-col justify-between gap-4 p-6">
        <h2 class="text-3xl font-bold text-center">{{ $article->title }}</h2>
        <div class="text-sm italic text-center">Dipublikasikan tanggal {{ $article->published_at->translatedFormat('d F Y') }}</div>

        <div class="flex w-full justify-center">
            <img src="{{ $article->banner }}" alt="{{ $article->title }}">
        </div>

        <p class="text-lg text-justify">
            {{ $article->content }}
        </p>

        <div class="text-sm font-semibold">Kategori: <a href="{{ route('article.category', $article->category->slug) }}">{{ $article->category->name }}</a></div>
    </article>
</x-app-layout>