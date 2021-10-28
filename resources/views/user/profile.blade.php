<x-app-layout>
    <x-slot name="title">Profil</x-slot>

    <main class="flex flex-col gap-4 p-8">
        <h1 class="text-3xl font-bold">Profil</h1>
        <div class="flex flex-col gap-8 p-4 bg-gray-100 shadow-md">
            <div class="flex flex-col gap-2">
                <div class="text-lg font-semibold">Nama <x-asterisk /></div>
                <div class="text-md">NAMA NAMA NAMA NAMA</div>
            </div>
            <div class="flex flex-col gap-2">
                <div class="text-lg font-semibold">Email <x-asterisk /></div>
                <div class="text-md">emailemail221@password.me</div>
            </div>
            <div class="flex">
                <x-button-primary link="{{ route('auth.change-password') }}">Ganti Password</x-button-primary>
            </div>
        </div>
    </main>
</x-app-layout>