<div class="grid grid-cols-12 gap-6">

    <div
        class="col-span-12 grid grid-cols-12 gap-6">
        <x-admin.cards.card
            color="primary"
            icon="people"
            title="{{ __('admin/words.users') }}"
            class="col-span-12 md:col-span-4">
            <div class="flex flex-wrap gap-1">
                <x-admin.badge
                    color="primary"
                    text="Total: {{ \App\Models\User::query()->count() }}" />
                <x-admin.badge
                    color="success"
                    text="{{ __('admin/layout.administrators') }}: {{ \App\Models\User::query()->has('roles')->count() }}" />
                <x-admin.badge
                    color="danger"
                    text="{{ __('admin/words.unverified') }}: {{ \App\Models\User::query()->whereNull('email_verified_at')->count() }}" />
            </div>
        </x-admin.cards.card>

        <x-admin.cards.card
            color="info"
            icon="shield-shaded"
            title="{{ __('admin/words.roles') }}"
            class="col-span-12 md:col-span-4">
            <div class="flex flex-wrap gap-1">
                <x-admin.badge
                    color="primary"
                    text="Total: {{ \App\Models\Role::query()->count() }}" />
                <x-admin.badge
                    color="light"
                    text="{{ __('admin/words.unused') }}: {{ \App\Models\Role::query()->doesntHave('users')->count() }}" />
            </div>
        </x-admin.cards.card>

        <x-admin.cards.card
            color="default"
            icon="app"
            title="Example"
            class="col-span-12 md:col-span-4">
            <div class="flex flex-wrap gap-1">

                <x-admin.dialog id="modal" size="normal">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque esse quae hic quam, facilis
                        adipisci numquam doloremque tenetur atque, maxime voluptate nostrum quos ipsam assumenda! Aut
                        sint animi officia temporibus.
                    </p>
                </x-admin.dialog>
                <x-admin.activator
                    target="modal">
                    <x-admin.badge
                        color="success"
                        text="Open a modal" />
                </x-admin.activator>

                <x-admin.dialog id="modal2" size="normal" persistent>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque esse quae hic quam, facilis
                        adipisci numquam doloremque tenetur atque, maxime voluptate nostrum quos ipsam assumenda! Aut
                        sint animi officia temporibus.
                    </p>
                </x-admin.dialog>
                <x-admin.activator
                    target="modal2">
                    <x-admin.badge
                        color="light"
                        text="Open a persistent modal" />
                </x-admin.activator>
            </div>
        </x-admin.cards.card>
    </div>

    <x-admin.section
        title="Section list"
        class="col-span-12">

        <x-slot name="headerAction">
            <x-admin.buttons.clickable text="{{ __('admin/words.more') }}" append-icon="arrow-right" size="small"
                outlined />
        </x-slot>


        <x-slot name="footerAction">
            <x-admin.buttons.clickable text="Go to Google"
                append-icon="arrow-right" size="small" href="https://google.com.br" target="_blank"
                title="Go to Google" outlined external />
            <x-admin.buttons.clickable text="{{ __('admin/words.more') }} {{ __('admin/words.details') }}"
                append-icon="arrow-right" size="small" href="{{ route('admin.roles.index') }}" />
        </x-slot>

        <x-admin.list.table.table>

            <x-slot name="thead">
                <x-admin.list.table.tr>
                    <x-admin.list.table.th>
                        Column #1
                    </x-admin.list.table.th>
                    <x-admin.list.table.th>
                        Column #2
                    </x-admin.list.table.th>
                    <x-admin.list.table.th>
                        Column #3
                    </x-admin.list.table.th>
                </x-admin.list.table.tr>
            </x-slot>
            <x-slot name="tbody">
                <x-admin.list.table.tr>
                    <x-admin.list.table.td>
                        Lorem, ipsum dolor
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        Lorem
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        Lorem
                    </x-admin.list.table.td>
                </x-admin.list.table.tr>

                <x-admin.list.table.tr>
                    <x-admin.list.table.td>
                        Lorem ipsum dolor sit amet consectetur.
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        Lorem
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        Lorem
                    </x-admin.list.table.td>
                </x-admin.list.table.tr>
            </x-slot>

        </x-admin.list.table.table>

    </x-admin.section>

</div>
