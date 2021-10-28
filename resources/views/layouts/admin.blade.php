<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    
    <x-admin-menu />
    
    <main class="m-8">
        {{ $slot }}
    </main>
</x-app-layout>