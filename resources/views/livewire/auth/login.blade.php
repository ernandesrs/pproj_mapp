<div class="shadow-md border border-opacity-5 w-full max-w-[475px] p-8 rounded">
    <div class="text-3xl font-semibold text-center text-admin-font-light-normal cursor-default mb-8">Login</div>

    @if ($errors->count())
        <ul
            class="bg-admin-danger-normal bg-opacity-25 border border-admin-danger-normal text-center text-admin-danger-dark py-2 px-4 mb-8">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form
        wire:submit.prevent="attempt"
        class="flex flex-col gap-6 ">
        <input
            wire:model="email"
            type="email"
            class="w-full border px-6 py-3 outline-none" type="text"
            placeholder="E-mail">

        <input
            wire:model="password"
            type="password"
            class="w-full border px-6 py-3 outline-none" type="text"
            placeholder="Senha">

        <div class="flex justify-start items-center">
            <input
                wire:model="remember"
                id="remember"
                type="checkbox"
                class="w-6 mr-2 m-0 outline-none" type="text"
                placeholder="Senha"> <label for="remember">Remember-me</label>
        </div>

        <button type="submit" wire:loading.attr="disabled" wire:loading.class="animate-pulse"
            class="px-6 py-3 bg-admin-primary-normal hover:opacity-80 duration-300 text-white">
            <span wire:loading.remove>Login</span>
            <span wire:loading>Wait...</span>
        </button>
    </form>

</div>
