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
                    <x-admin.buttons.confirmation
                        color="danger"
                        button-confirm-action="deleteAvatar"
                        text="{{ __('admin/alerts.confirmation.delete') }}"
                        class="absolute bottom-0 mx-auto">
                        <x-admin.buttons.clickable
                            prepend-icon="trash"
                            color="danger"
                            size="small"
                            circle />
                    </x-admin.buttons.confirmation>
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
            submit-text="{{ __('admin/words.update') }}"
            submitting-text="{{ __('admin/words.updating') }}"
            class="grid grid-cols-12 gap-6">
            <x-admin.views.user-basic-data />

            <x-admin.form.field
                label="{{ __('admin/words.email') }}"
                class="col-span-12"
                name="email"
                disabled />
        </x-admin.form.base>
    </x-admin.section>

    <x-admin.section
        title="{{ __('admin/phrases.update_password') }}">
        <x-admin.form.base
            action="updatePassword"
            submit-text="{{ __('admin/words.update') }}"
            submitting-text="{{ __('admin/words.updating') }}"
            class="grid grid-cols-12 gap-6">
            <x-admin.views.user-password />
        </x-admin.form.base>
    </x-admin.section>

</div>
