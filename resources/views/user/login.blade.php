<x-app-layout>
    <x-slot name="title">Login</x-slot>

    <form method="POST" action="{{ route('auth.login') }}" class="flex flex-col p-4 bg-gray-100 shadow-md gap-8">
        <h3 class="text-xl font-bold">Login</h3>
        @csrf
        <div class="flex flex-col gap-2">
            <label for="login-form-email" class="font-semibold">Email <x-asterisk /></label>
            <input id="login-form-email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow" />
            @error('email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="login-form-password" class="font-semibold">Password <x-asterisk /></label>
            <input id="login-form-password" type="password" name="password" value="{{ old('password') }}" placeholder="password" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow" />
            @error('password')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex flex-row gap-4">
            <button type="submit" class="px-4 py-2 font-semibold text-gray-100 transition-colors bg-blue-600 rounded-lg hover:bg-blue-800">Login</button>
            @if (session('failed') !== null)  
            <div class="flex p-2 rounded border-2 bg-red-400 border-red-500">Email atau Password salah.</div>
            @endif
        </div>
    </form>
</x-app-layout>