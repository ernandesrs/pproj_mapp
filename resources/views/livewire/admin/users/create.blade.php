<x-admin.form.base
    action="save"
    submit-text="{{ __('admin/worlds.register') }}"
    submitting-text="{{ __('admin/worlds.registering') }}">

    <div class="grid grid-cols-12 gap-6">
        <x-admin.views.user-basic-data />

        <x-admin.form.field
            name="email"
            type="text"
            label="{{ __('admin/worlds.email') }}"
            class="col-span-12" />

        <x-admin.views.user-password />
    </div>

</x-admin.form.base>
