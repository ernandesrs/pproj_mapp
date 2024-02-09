<x-admin.form.field
    name='first_name'
    type="text"
    label="{{ __('admin/worlds.first_name') }}"
    class="col-span-12 md:col-span-6" />

<x-admin.form.field
    name="last_name"
    type="text"
    label="{{ __('admin/worlds.last_name') }}"
    class="col-span-12 md:col-span-6" />

<x-admin.form.field
    name="username"
    type="text"
    label="{{ __('admin/worlds.username') }}"
    class="col-span-12 sm:col-span-6" />

<x-admin.form.field
    name="gender"
    type="select"
    label="{{ __('admin/worlds.gender') }}"
    :options="[
        [
            'label' => __('admin/worlds.none'),
            'value' => 'n',
        ],
        [
            'label' => __('admin/worlds.male'),
            'value' => 'm',
        ],
        [
            'label' => __('admin/worlds.female'),
            'value' => 'f',
        ],
    ]"
    class="col-span-12 sm:col-span-6" />
