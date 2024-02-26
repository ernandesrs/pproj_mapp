@props([
    'show' => false,

    'id' => null,

    'title' => null,

    'buttonCloseText' => __('admin/words.close'),

    // full, extrasmall, small, normal, medium, large, extralarge
    'size' => 'normal',

    // top, center, bottom
    'position' => 'center',

    'persistent' => false,

    'closable' => true,
])

@php
    if (empty($id)) {
        throw new \Exception('Needs a value to "id" prop');
    }
@endphp

<div
    x-data="{
        ...{{ json_encode([
            'data' => [
                'propShow' => $show,
                'id' => $id,
                'show' => false,
                'showContent' => false,
                'persistent' => $persistent,
            ],
        ]) }},

        init() {
            $nextTick(() => {
                if (this.data.propShow) {
                    this.show();
                }
            });
        },

        activate(e) {
            if (e.detail?.target != this.data.id) return;

            this.show();
        },
        show() {
            this.data.show = true;

            setTimeout(() => {
                this.data.showContent = true;
            }, 200);

            this.addClickoutMonitor();
        },
        close() {
            this.data.showContent = false;

            setTimeout(() => {
                this.data.show = false;
                this.removeClickoutMonitor();
            }, 300);

        },
        addClickoutMonitor() {
            document.addEventListener('click', (event) => {
                if (($refs.dialogContent.contains(event.target) || $refs.dialogBackdrop != event.target) || this.data.persistent)
                    return;

                this.close();
            });
        },
        removeClickoutMonitor() {
            {{-- console.log('Adicionar evento para monitor clique fora do modal para fecha-lo') --}}
        }
    }"

    x-on:activator_to_{{ $id }}.window="activate"
    x-show="data.show"
    x-ref="dialogBackdrop"

    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"

    class="flex justify-center {{ [
        'top' => 'items-start',
        'center' => 'items-center',
        'bottom' => 'items-end',
    ][$position] }} w-full h-screen fixed z-40 left-0 top-0 bg-black bg-opacity-75 p-6"
    style="display: none">

    <div
        x-show="data.showContent"
        x-ref="dialogContent"

        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-110"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-110"

        class="w-full {{ [
            'full' => 'h-full',
            'extrasmall' => 'max-w-[325px]',
            'small' => 'max-w-[425px]',
            'normal' => 'max-w-[625px]',
            'medium' => 'max-w-[825px]',
            'large' => 'max-w-[1025px]',
            'extralarge' => 'max-w-[1280px]',
        ][$size] }} border bg-admin-light-light shadow-lg rounded dark:bg-admin-dark-light dark:border-admin-dark-normal dark:shadow-admin-dark-dark">

        {{-- header --}}
        @if (isset($header) || $title)
            <div class="px-6 pt-6 pb-3 flex items-center justify-between">
                @isset($header)
                    <div>
                        {{ $header }}
                    </div>
                @else
                    @if ($title)
                        <h4 class="text-admin-font-light-normal text-lg md:text-xl font-medium">{{ $title }}</h4>
                    @endif
                @endisset
            </div>
        @endif

        {{-- body --}}
        <div class="px-6 {{ isset($header) ? 'pt-3' : 'pt-6' }} {{ isset($footer) ? 'pb-3' : 'pb-3' }}">
            {{ $slot }}
        </div>

        {{-- footer --}}
        <div class="px-6 pt-3 pb-6 flex items-center">
            @isset($footer)
                {{ $footer }}
            @endisset

            @if ($closable)
                <x-admin.buttons.clickable
                    x-on:click="close"
                    class="ml-auto"
                    size="small"
                    text="{{ $buttonCloseText }}"
                    prepend-icon="x-lg" />
            @endif
        </div>
    </div>

</div>
