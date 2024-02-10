<x-admin.form.base
    action="save"
    submit-text="{{ __('admin/words.register') }}"
    submitting-text="{{ __('admin/words.registering') }}">

    <div class="grid grid-cols-12 gap-6">
        <x-admin.views.user-basic-data />

        <x-admin.form.field
            name="email"
            type="text"
            label="{{ __('admin/words.email') }}"
            class="col-span-12" />

        <x-admin.views.user-password />
    </div>

</x-admin.form.base>
