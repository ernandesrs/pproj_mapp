<div class="grid gap-6">
    <x-admin.section
        title="{{ __('admin/phrases.update_avatar') }}">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 sm:col-span-6 md:col-span-4 flex justify-center items-center relative">
                <x-admin.thumb
                    size="extralarge"
                    image="{{ \Auth::user()->avatar() }}"
                    alternative-text="{{ \Auth::user()->username }}" />

                @if (\Auth::user()->avatar())
                    <button
                        wire:confirm="{{ __('admin/alerts.confirmation.delete') }}"
                        wire:target="deleteAvatar"
                        wire:click="deleteAvatar"
                        wire:loading.attr="disabled"
                        wire:loading.class="animate-pulse"
                        class="w-8 h-8 bg-admin-danger-normal text-admin-font-dark-light dark:bg-admin-danger-dark absolute bottom-0 mx-auto flex justify-center items-center rounded-full">
                        <x-admin.icon name="trash" />
                    </button>
                @endif
            </div>

            <div class="col-span-12 sm:col-span-6 md:col-span-8">
                <x-admin.form.file
                    wire:model="data.avatar"
                    action-save="updateAvatar"
                    action-clear="clearAvatar"
                    :temp-file="$this->data['avatar']"
                    accept="image/*"
                    error="{{ $errors->first('data.avatar') }}" />
            </div>
        </div>
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
