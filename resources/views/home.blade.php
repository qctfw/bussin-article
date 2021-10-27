<x-app-layout>
    <x-slot name="title">Halaman Utama</x-slot>

    <main class="flex flex-row p-6 justify-between">
        <div class="flex flex-col w-3/4">
            <h2 class="text-lg font-semibold">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 gap-5 mt-4">
                @for ($i = 1; $i <= 5; $i++)
                <x-article-preview banner="https://via.placeholder.com/468x150.png" title="ARTICLE TITLE" paragraph="Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus voluptas, rerum doloribus reprehenderit voluptates voluptatem tempora ab dolorum temporibus tempore molestias voluptatibus cumque amet at quisquam sint animi sit iusto. Perferendis maiores, animi quo sunt commodi at qui voluptate eos recusandae, ducimus nesciunt fugit, minus unde modi accusantium beatae reiciendis." link="#" />
                @endfor
            </div>
        </div>
        <aside class="w-1/4">
            <div class="grid grid-cols-1 gap-4">
                <div class="flex flex-col gap-4">
                    <h2 class="text-lg font-semibold">Kategori</h2>
                    <div class="flex flex-wrap gap-2">
                        <x-button-secondary link="#">Kategori</x-button-secondary>
                    </div>
                </div>
            </div>
        </aside>
    </main>
</x-app-layout>