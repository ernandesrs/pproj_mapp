<x-admin.form.base
    action="save"
    submit-text="{{ __('admin/words.register') }}"
    submitting-text="{{ __('admin/words.registering') }}">

    <div class="grid grid-cols-12 gap-6">
        <x-admin.form.field
            name='name'
            type="text"
            label="{{ __('admin/words.name') }} {{ __('admin/words.role') }}"
            class="col-span-12" />
    </div>

</x-admin.form.base>
