@props([
    'title' => null,
    'breadcrumbs' => [],
])

@php
    $showPageHeader = count($breadcrumbs) || !empty($title) ? true : false;

    if (count($breadcrumbs)) {
        $breadcrumbs = [
            [
                'label' => 'Home',
                'href' => route('admin.home'),
                'disabled' => true,
            ],
            ...$breadcrumbs,
        ];
    }
@endphp

<div class="flex-1 flex flex-col pb-6">

    {{-- page header --}}
    @if ($showPageHeader)
        <div class="container mt-6 py-3 flex items-center">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-x-6">
                @if (!empty($title))
                    <h1 class="text-xl font-semibold md:text-2xl md:font-bold">
                        {{ $title }}
                    </h1>
                @endif

                @if (count($breadcrumbs))
                    <nav class="flex items-center gap-x-1">
                        @for ($i = 0; $i < count($breadcrumbs); $i++)
                            <a
                                wire:navigate
                                class="py-2 text-admin-primary-light hover:text-admin-primary-normal duration-300 {{ $breadcrumbs[$i]['disabled'] ?? false ? 'pointer-events-none' : '' }}"
                                href="{{ $breadcrumbs[$i]['href'] }}"
                                title="{{ $breadcrumbs[$i]['title'] ?? $breadcrumbs[$i]['label'] }}">
                                {{ $breadcrumbs[$i]['label'] }}
                            </a>

                            @isset($breadcrumbs[$i + 1])
                                <a
                                    class="px-1 pointer-events-none text-admin-light-dark" href="#">
                                    »
                                </a>
                            @endisset
                        @endfor
                    </nav>
                @endif
            </div>
        </div>
    @endif

    {{-- content --}}
    <div class="container mt-6 flex-1 flex">
        <div class="bg-admin-light-light flex-1 p-6 rounded">
            {{ $slot }}
        </div>
    </div>

</div>
