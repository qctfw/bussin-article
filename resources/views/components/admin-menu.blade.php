<nav class="flex flex-row items-center gap-4 p-4">
    <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 font-semibold text-gray-100 transition-colors {{ (request()->routeIs('admin.articles.index') ? 'bg-blue-600' : 'bg-gray-600') }} rounded-lg hover:bg-blue-800">Kelola Artikel</a>
    <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 font-semibold text-gray-100 transition-colors {{ (request()->routeIs('admin.categories.index') ? 'bg-blue-600' : 'bg-gray-600') }} rounded-lg hover:bg-blue-800">Kelola Kategori</a>
    <a href="{{ route('admin.users') }}" class="px-4 py-2 font-semibold text-gray-100 transition-colors {{ (request()->routeIs('admin.users') ? 'bg-blue-600' : 'bg-gray-600') }} rounded-lg hover:bg-blue-800">Kelola User</a>
</nav>