<x-app-layout>
    <x-slot name="title">Ganti Password</x-slot>

    <main class="flex flex-col gap-4 p-8">
        <form method="POST" action="#" class="flex flex-col p-4 bg-gray-100 shadow-md gap-8">
            <h3 class="text-xl font-bold">Ganti Password</h3>
            @csrf
            @method('PATCH')
            <div class="flex flex-col gap-2">
                <label for="password-form-old-password" class="font-semibold">Password Lama <x-asterisk /></label>
                <input id="password-form-old-password" type="password" name="old-password" placeholder="Password Lama" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow" />
                @error('old-password')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="password-form-new-password" class="font-semibold">Password Baru <x-asterisk /></label>
                <input id="password-form-new-password" type="password" name="new-password" placeholder="Password Lama" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow" />
                @error('new-password')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col gap-2">
                <label for="password-form-new-password-confirmation" class="font-semibold">Konfirmasi Password Baru <x-asterisk /></label>
                <input id="password-form-new-password-confirmation" type="password" name="new-password-confirmation" placeholder="Password Lama" required="required" class="p-2 bg-gray-200 focus:bg-gray-300 rounded shadow" />
                @error('new-password-confirmation')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="flex flex-row gap-4">
                <button type="submit" class="px-4 py-2 font-semibold text-gray-100 transition-colors bg-blue-600 rounded-lg hover:bg-blue-800">Ubah</button>
            </div>
        </form>
    </main>
</x-app-layout>