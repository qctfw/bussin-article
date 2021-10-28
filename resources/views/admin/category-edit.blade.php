<x-admin-layout>
    <x-slot name="title">Edit Kategori {{ $category->title }}</x-slot>

    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" class="flex flex-col p-4 bg-gray-100 shadow-md gap-8">
        <h3 class="text-xl font-bold">Edit Kategori</h3>
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $category->id }}" />
        <div class="flex flex-col gap-2">
            <label for="category-form-title" class="font-semibold">Nama <x-asterisk /></label>
            <input id="category-form-title" type="text" name="name" value="{{ $category->name }}" placeholder="Nama" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow" />
            @error('name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-row gap-4">
            <button type="submit" class="px-4 py-2 font-semibold text-gray-100 transition-colors bg-blue-600 rounded-lg hover:bg-blue-800">Simpan</button>
        </div>
    </form>
</x-admin-layout>