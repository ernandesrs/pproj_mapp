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
                        <x-admin.confirmation
                            color="danger"
                            button-confirm-action="deleteAvatar"
                            text="{{ __('admin/alerts.confirmation.delete') }}"
                            class="absolute bottom-0 mx-auto">
                            <x-admin.buttons.clickable
                                prepend-icon="trash"
                                color="danger"
                                size="small"
                                circle />
                        </x-admin.confirmation>
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

                <div class="border py-3 px-2 flex flex-wrap justify-center gap-y-2 gap-x-3">
                    @foreach ($this->roles as $role)
                        <div class="flex items-center">
                            <button
                                wire:target="assignRole"
                                wire:loading.class="pointer-events-none animate-pulse"
                                wire:confirm="{{ __('admin/alerts.confirmation.assigning_role', ['role' => $role->name]) }}"
                                wire:click="assignRole({{ $role->id }})"
                                {{ $this->user->hasRole($role) ? 'disabled' : '' }}>
                                <x-admin.badge color="{{ $this->user->hasRole($role) ? 'success' : 'light' }}">
                                    {{ $role->name }}
                                </x-admin.badge>
                            </button>
                            @if ($this->user->hasRole($role))
                                <button
                                    wire:target="revokeRole"
                                    wire:loading.class="pointer-events-none animate-pulse"
                                    wire:confirm="{{ __('admin/alerts.confirmation.removing_role', ['role' => $role->name]) }}"
                                    wire:click="revokeRole({{ $role->id }})"
                                    class="pl-1 text-admin-danger-normal dark:text-admin-danger-dark">
                                    <x-admin.icon name="x-lg" />
                                </button>
                            @endif
                        </div>
                    @endforeach
                </div>

            </x-admin.section>
        @endif

    </div>

    <div class="col-span-12 lg:col-span-8">

        <x-admin.section
            title="{{ __('admin/phrases.basic_data') }}" class="mb-6">

            <x-admin.form.base
                action="save"
                submit-text="{{ __('admin/words.update') }}"
                submitting-text="{{ __('admin/words.updating') }}"
                class="grid grid-cols-12 gap-6">

                <x-admin.views.user-basic-data />

                <x-admin.form.field
                    name="email"
                    type="text"
                    label="{{ __('admin/words.email') }}"
                    disabled
                    class="col-span-12" />
            </x-admin.form.base>

        </x-admin.section>

        {{-- password --}}
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

</div>
