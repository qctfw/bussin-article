<section class="flex flex-row items-center gap-3">
    <div class="w-1/5">
        <img src="{{ $banner }}" alt="{{ $title }}" />
    </div>
    <div class="flex flex-col justify-between w-4/5 h-full gap-3">
        <h3 class="text-xl font-bold">{{ $title }}</h3>
        <p>{{ $paragraph }}</p>
        <div>
            <x-button-primary link="#">Baca Selengkapnya</x-button-primary>
        </div>
    </div>
</section>