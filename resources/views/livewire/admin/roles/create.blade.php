<x-admin.form.base
    action="save"
    submit-text="{{ __('admin/worlds.register') }}"
    submitting-text="{{ __('admin/worlds.registering') }}">

    <div class="grid grid-cols-12 gap-6">
        <x-admin.form.field
            name='name'
            type="text"
            label="{{ __('admin/worlds.name') }} {{ __('admin/worlds.role') }}"
            class="col-span-12" />
    </div>

</x-admin.form.base>
