<x-admin-layout>
    <x-slot name="title">Halaman Admin</x-slot>

    <div class="flex flex-row items-center justify-center p-4 bg-gray-100 shadow-md gap-8">
        <div class="flex flex-col justify-between">
            <div class="text-xl">Jumlah Artikel</div>
            <div class="text-3xl font-bold">{{ $article_count }}</div>
        </div>
        <div class="flex flex-col justify-between">
            <div class="text-xl">Jumlah Kategori</div>
            <div class="text-3xl font-bold">{{ $category_count }}</div>
        </div>
    </div>
</x-admin-layout>