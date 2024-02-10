<div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 lg:col-span-4">

        <x-admin.section
            title="{{ __('admin/phrases.update_avatar') }}"
            class="mb-6">

            <div class="flex flex-col items-center ">
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
            </div>

        </x-admin.section>

        @if (\Auth::user()->can('permissionEdit', $this->user))
            <x-admin.section
                title="{{ __('admin/phrases.user_roles') }}">

                @if ($this->user->roles()->count())
                    @foreach ($this->user->roles()->get() as $role)
                        <x-admin.badge color="success">
                            {{ $role->name }}
                        </x-admin.badge>
                    @endforeach
                @else
                    <span class="text-admin-font-dark-dark italic text-sm">
                        {{ __('admin/phrases.undefined_role') }}
                    </span>
                @endif

            </x-admin.section>
        @endif

    </div>

    <div class="col-span-12 lg:col-span-8">

        <x-admin.section
            title="{{ __('admin/phrases.basic_data') }}">

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

</div>
