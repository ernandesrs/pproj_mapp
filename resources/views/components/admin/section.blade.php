@props([
    'title' => null,
])

<div
    {{ $attributes->merge(['class' => 'bg-admin-light-light w-full border py-6 px-8 rounded dark:bg-admin-dark-normal dark:bg-opacity-75 dark:border-admin-dark-normal']) }}>

    @if (!empty($title) || isset($headerAction))
        <div class="flex flex-wrap items-center mb-6">
            <h4 class="text-lg md:text-xl font-medium">{{ $title }}</h4>

            @isset($headerAction)
                <div class="flex flex-wrap items-center ml-auto">
                    {{ $headerAction }}
                </div>
            @endisset
        </div>
    @endif

    {{ $slot }}

    @isset($footerAction)
        <div class="flex justify-end mt-6 gap-x-3">
            {{ $footerAction }}
        </div>
    @endisset
</div>
