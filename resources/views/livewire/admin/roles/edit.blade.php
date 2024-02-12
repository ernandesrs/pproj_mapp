<x-admin.form.base
    action="save"
    :show-submit-button="!$this->model->isProtected()"
    submit-text="{{ __('admin/words.update') }}"
    submitting-text="{{ __('admin/words.updating') }}">

    <div class="grid grid-cols-12 gap-x-6 gap-y-3">
        <x-admin.form.field
            name='name'
            type="text"
            label="{{ __('admin/words.name') }} {{ __('admin/words.role') }}"
            class="col-span-12" :disabled="$this->role->isProtected()" />

        <div class="col-span-12 mt-4">
            <div class="text-xl font-semibold">{{ __('admin/words.permissions') }}</div>
        </div>
        @if ($this->role->isSuper())
            <div class="col-span-12">
                <div class="border p-6 text-base font-medium text-center text-admin-font-light-light text-opacity-35">
                    {{ __('admin/phrases.protected_by_system') }}
                </div>
            </div>
        @elseif($this->permissions)
            <div class="col-span-12 flex flex-wrap justify-center gap-2">
                @foreach ($this->permissions as $permission)
                    <div
                        wire:target="assignRevokePermissionToRole"
                        wire:loading.class="pointer-events-none animate-pulse"
                        wire:click="assignRevokePermissionToRole({{ $permission }})"
                        class="relative px-4 py-2 cursor-pointer overflow-hidden rounded {{ $this->role->hasPermissionTo($permission->name) ? 'bg-admin-success-normal text-admin-light-light dark:bg-admin-success-dark' : 'bg-admin-light-light text-admin-font-light-light dark:bg-admin-dark-normal' }} hover:opacity-75 dark:hover:opacity-75 duration-300">
                        @if ($this->role->hasPermissionTo($permission->name))
                            <x-admin.icon name="check-lg"
                                class="mr-2 " />
                        @endif
                        {{ $permission->name }}
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</x-admin.form.base>
