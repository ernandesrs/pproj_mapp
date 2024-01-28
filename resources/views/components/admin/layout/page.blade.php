@props([
    'title' => $title ?? $this->getPageTitle(),
    'breadcrumbs' => $breadcrumbs ?? $this->getPageBreadcrumbs(),
    'actions' => $actions ?? $this->getPageActions(),
    'uncontained' => false,
])

@php
    $showPageHeader = count($breadcrumbs) || !empty($title) ? true : false;

    if (count($breadcrumbs)) {
        $breadcrumbs = [
            [
                'label' => 'Home',
                'href' => route('admin.home'),
                'disabled' => false,
            ],
            ...$breadcrumbs,
        ];
    }
@endphp

<div class="flex-1 flex flex-col pb-6">

    {{-- page header --}}
    @if ($showPageHeader)
        <div class="container mt-6 py-3 flex items-center">
            {{-- title/breadcrumbs --}}
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
                                class="py-2 text-admin-font-light-muted hover:text-admin-font-light-normal dark:text-admin-font-dark-dark dark:hover:text-admin-font-dark-normal duration-300 {{ $breadcrumbs[$i]['disabled'] ?? false ? 'disabled' : '' }}"
                                href="{{ $breadcrumbs[$i]['href'] }}"
                                title="{{ $breadcrumbs[$i]['title'] ?? $breadcrumbs[$i]['label'] }}">
                                {{ $breadcrumbs[$i]['label'] }}
                            </a>

                            @isset($breadcrumbs[$i + 1])
                                <a
                                    class="px-1 pointer-events-none text-admin-light-dark dark:text-admin-light-dark"
                                    href="#">
                                    »
                                </a>
                            @endisset
                        @endfor
                    </nav>
                @endif
            </div>


            {{-- actions --}}
            <div class="ml-auto">
                @if (count($actions))
                    <div
                        class="flex
                 items-center bg-admin-light-light dark:bg-admin-dark-normal dark:bg-opacity-50 p-1 rounded overflow-hidden">

                        @foreach ($actions as $action)
                            <a
                                wire:navigate
                                href="{{ $action['href'] }}"
                                title="{{ $action['title'] ?? $action['text'] }}"
                                class="text-admin-font-light-light text-opacity-75 dark:text-admin-font-dark-normal hover:text-admin-font-light-normal dark:hover:text-admin-font-dark-light hover:bg-admin-light-normal hover:bg-opacity-50 dark:hover:bg-admin-dark-normal dark:hover:bg-opacity-75 duration-300 px-4 py-2 rounded">
                                @isset($action['icon'])
                                    <x-admin.icon name="{{ $action['icon'] }}" />
                                @endisset
                                @isset($action['text'])
                                    <span class="ml-1">
                                        {{ $action['text'] }}
                                    </span>
                                @endisset
                            </a>
                        @endforeach

                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- content --}}
    <div class="container mt-6 flex-1 flex">
        <div class="{{ $uncontained ? '' : 'bg-admin-light-light dark:bg-admin-dark-normal p-6' }} flex-1 rounded">
            {{ $slot }}
        </div>
    </div>

</div>
