<x-admin.form.field
    name="password"
    type="password"
    label="{{ __('admin/worlds.password') }}"
    class="col-span-12 sm:col-span-6" />

<x-admin.form.field
    name="password_confirmation"
    type="password"
    label="{{ __('admin/worlds.confirm') }} {{ strtolower(__('admin/worlds.password')) }}"
    class="col-span-12 sm:col-span-6" />
