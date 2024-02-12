<x-admin.layout.page
    :uncontained="$this->uncontained">

    <x-admin.alert />

    @include('livewire.admin.' . $this->viewContent)

</x-admin.layout.page>
