<div class="grid grid-cols-12 gap-6">
    <x-admin.section
        class="lg:col-span-4 flex flex-col items-center">

        <x-admin.thumb
            size="extralarge"
            image="{{ $this->model->avatar() }}"
            alternative-text="{{ $this->model->first_name }}" />

        <div class="w-full mt-6 text-center">
            <x-admin.form.file name="avatar" />
        </div>

    </x-admin.section>

    <x-admin.section
        class="lg:col-span-8">

        <x-admin.form.base
            action="save"
            submit-text="{{ __('admin/worlds.update') }}"
            submitting-text="{{ __('admin/worlds.updating') }}"
            class="grid grid-cols-12 gap-6">

            <x-admin.views.user-basic-data />

            <x-admin.form.field
                name="email"
                type="text"
                label="{{ __('admin/worlds.email') }}"
                disabled
                class="col-span-12" />
        </x-admin.form.base>

    </x-admin.section>

</div>
