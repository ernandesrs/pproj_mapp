<div class="grid gap-6">
    <x-admin.section
        title="{{ __('admin/phrases.update_avatar') }}">
        {{--  --}}
    </x-admin.section>

    <x-admin.section
        title="{{ __('admin/phrases.basic_data') }}">
        <x-admin.form.base
            action="updateData"
            submit-text="{{ __('admin/worlds.update') }}"
            submitting-text="{{ __('admin/worlds.updating') }}"
            class="grid grid-cols-12 gap-6">
            <x-admin.views.user-basic-data />

            <x-admin.form.field
                label="{{ __('admin/worlds.email') }}"
                class="col-span-12"
                name="email"
                disabled />
        </x-admin.form.base>
    </x-admin.section>

    <x-admin.section
        title="{{ __('admin/worlds.update_password') }}">
        <x-admin.form.base
            action="updatePassword"
            submit-text="{{ __('admin/worlds.update') }}"
            submitting-text="{{ __('admin/worlds.updating') }}"
            class="grid grid-cols-12 gap-6">
            <x-admin.views.user-password />
        </x-admin.form.base>
    </x-admin.section>

</div>
