@php
    $generalSettings = app(\App\Settings\GeneralSettings::class);
@endphp
<x-mail::layout>
    {{-- Header --}}
    <x-slot:header>
        <x-mail::header :url="config('app.url')">
            @if ($generalSettings->logo)
                <div class="px-6 pt-8 pb-4 text-center border-b border-gray-100">
                   <div class="inline-block float-animation">
                        <img
                            src="{{ asset('storage/' . $generalSettings->logo) }}"
                            alt="Logo"
                            class="h-12 mx-auto object-contain"
                            style="max-width: 350px;"
                        >
                    </div>
        @else
        {{ config('app.name') }}
        @endif
        </x-mail::header>
    </x-slot:header>

    {{-- Body --}}
    {!! $slot !!}

    {{-- Subcopy --}}
    @isset($subcopy)
        <x-slot:subcopy>
            <x-mail::subcopy>
                {!! $subcopy !!}
            </x-mail::subcopy>
        </x-slot:subcopy>
    @endisset

    {{-- Footer --}}
    <x-slot:footer>
        <x-mail::footer>
            {{ $generalSettings->copyright }}
        </x-mail::footer>
    </x-slot:footer>
</x-mail::layout>