<x-admin-layout>
    <x-slot name="title">Kelola Kategori</x-slot>

    <div class="flex flex-row justify-between gap-4">
        <form method="POST" action="{{ route('admin.categories.store') }}" class="flex flex-col w-1/2 gap-8 p-4 bg-gray-100 shadow-md">
            <h3 class="text-xl font-bold">Kategori Baru</h3>

            @csrf
            <div class="flex flex-col gap-2">
                <label for="categories-form-name" class="font-semibold">Nama <x-asterisk /></label>
                <input id="categories-form-name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama" required="required" class="p-2 bg-gray-200 rounded shadow focus:bg-gray-300" />
                @error('name')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-row gap-4">
                <button type="submit" class="px-4 py-2 font-semibold text-gray-100 transition-colors bg-blue-600 rounded-lg hover:bg-blue-800">Simpan</button>
            </div>

            @if (session('message') !== null)  
                <div class="flex p-2 rounded border-2 {{ session('success') ? 'bg-green-400 border-green-500' : 'bg-red-400 border-red-500' }}">{{ session('message') }}</div>
            @endif
        </form>

        <div class="flex flex-col gap-8 p-4 bg-gray-100 shadow-md w-1/2">
            <h3 class="text-xl font-bold">Data Kategori</h3>
            <table class="min-w-full divide-y divide-gray-400 table-fixed">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="p-2 text-sm font-medium tracking-wider text-left text-gray-500 uppercase w-1/8 dark:text-gray-100">
                        Nama
                        </th>
                        <th scope="col" class="relative w-1/12 p-2">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                    @forelse ($categories as $category)
                    <tr>
                        <td class="p-2">
                            <div class="flex">{{ $category->name }}</div>
                        </td>
                        <td>
                            <div class="flex flex-row gap-2 px-6 py-4 text-sm font-medium">
                                <x-button-secondary link="{{ route('admin.categories.edit', $category->id) }}">Edit</x-button-secondary>
                                <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="javascript:confirm('Yakin ingin menghapus?')" type="submit" class="px-3 py-1 font-semibold text-gray-100 transition-colors bg-red-500 rounded-lg hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="p-4 italic text-center">Tidak ada kategori.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>