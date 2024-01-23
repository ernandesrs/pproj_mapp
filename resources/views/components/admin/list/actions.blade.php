<div class="w-full flex gap-1 justify-end items-center opacity-0 translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 duration-300">
    <a wire:navigate
        class="py-1 px-2 bg-admin-light-normal hover:bg-admin-primary-normal text-admin-primary-normal hover:text-admin-light-normal rounded duration-300"
        href="">
        <x-admin.icon name="eye" />
    </a>

    <a wire:navigate
        class="py-1 px-2 bg-admin-light-normal hover:bg-admin-info-normal text-admin-info-normal hover:text-admin-light-normal rounded duration-300"
        href="">
        <x-admin.icon name="pencil" />
    </a>

    <a wire:navigate
        class="py-1 px-2 bg-admin-light-normal hover:bg-admin-danger-normal text-admin-danger-dark hover:text-admin-light-normal rounded duration-300"
        href="">
        <x-admin.icon name="trash" />
    </a>
</div>
