<section class="flex flex-col items-center gap-3">
    <div class="flex justify-center w-full">
        <img src="/{{ $banner }}" alt="{{ $title }}" />
    </div>
    <div class="flex flex-col justify-between h-full gap-3 text-center">
        <h3 class="text-xl font-bold">{{ $title }}</h3>
        <p>{{ \Str::words($paragraph, 25) }}</p>
        <div>
            <x-button-primary link="{{ $link }}">Baca Selengkapnya</x-button-primary>
        </div>
    </div>
</section>