<header class="flex flex-row items-center justify-between w-full px-6 py-4 text-gray-100 bg-blue-600">
    <a href="{{ route('article.home') }}">
        <h1 class="flex text-2xl font-bold">{{ config('app.name') }}</h1>
    </a>
    <div class="flex flex-row gap-4">
        @auth
        <a href="{{ route('admin.dashboard') }}" class="p-2 font-semibold transition-colors rounded-lg hover:bg-blue-800">Admin</a>
        <a href="{{ route('auth.profile') }}" class="p-2 font-semibold transition-colors rounded-lg hover:bg-blue-800">Profil</a>
        <form action="{{ route('auth.logout') }}" method="post">
            @csrf
            <button type="submit" class="p-2 font-semibold transition-colors rounded-lg hover:bg-blue-800">Logout</button>
        </form>
        @endauth
        @guest
        <a href="{{ route('auth.login') }}" class="p-2 font-semibold transition-colors rounded-lg hover:bg-blue-800">Login</a>
        @endguest
    </div>
</header>