@props([
    'title' => null,
    'breadcrumbs' => [
        [
            'label' => 'Home',
            'href' => route('admin.home'),
            'disabled' => true,
        ],
        [
            'label' => 'Overview',
            'href' => route('admin.home'),
            'disabled' => false,
        ],
    ],
])

<div class="flex-1 flex flex-col pb-6">
    <div class="container mt-6 py-3 flex items-center">
        <div class="flex items-center gap-x-4">
            <h1 class="lg:text-2xl font-bold">
                {{ $title }}
            </h1>

            <nav class="flex items-center gap-x-1">
                @for ($i = 0; $i < count($breadcrumbs); $i++)
                    <a
                        wire:navigate
                        class="px-2 py-2 text-admin-primary-light hover:text-admin-primary-normal duration-300 {{ $breadcrumbs[$i]['disabled'] ?? false ? 'pointer-events-none' : '' }}"
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
        </div>
    </div>

    {{-- content --}}
    <div class="container mt-6 flex-1 flex">
        <div class="bg-admin-light-light flex-1 p-6 rounded">
            {{ $slot }}
        </div>
    </div>

</div>
