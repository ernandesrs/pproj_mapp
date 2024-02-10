<div class="grid grid-cols-12 gap-6">
    <x-admin.section
        class="lg:col-span-4 flex flex-col items-center">

        <div class="relative flex justify-center">
            <x-admin.thumb
                size="extralarge"
                image="{{ $this->model->avatar() }}"
                alternative-text="{{ $this->model->first_name }}" />

            @if ($this->user->avatar())
                <button
                    wire:confirm="{{ __('admin/alerts.confirmation.delete') }}"
                    wire:target="deleteAvatar"
                    wire:click="deleteAvatar"
                    wire:loading.attr="disabled"
                    wire:loading.class="animate-pulse"
                    class="w-8 h-8 bg-admin-danger-normal text-admin-font-dark-light dark:bg-admin-danger-dark absolute bottom-0 flex justify-center items-center rounded-full">
                    <x-admin.icon name="trash" />
                </button>
            @endif
        </div>
        <div class="w-full mt-6 text-center">
            <x-admin.form.file
                wire:model="data.avatar"
                action-save="updateAvatar"
                action-clear="clearAvatar"
                :temp-file="$this->data['avatar']" />
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
