<x-admin.form.field
    name='first_name'
    type="text"
    label="{{ __('admin/words.first_name') }}"
    class="col-span-12 md:col-span-6" />

<x-admin.form.field
    name="last_name"
    type="text"
    label="{{ __('admin/words.last_name') }}"
    class="col-span-12 md:col-span-6" />

<x-admin.form.field
    name="username"
    type="text"
    label="{{ __('admin/words.username') }}"
    class="col-span-12 sm:col-span-6" />

<x-admin.form.field
    name="gender"
    type="select"
    label="{{ __('admin/words.gender') }}"
    :options="[
        [
            'label' => __('admin/words.none'),
            'value' => 'n',
        ],
        [
            'label' => __('admin/words.male'),
            'value' => 'm',
        ],
        [
            'label' => __('admin/words.female'),
            'value' => 'f',
        ],
    ]"
    class="col-span-12 sm:col-span-6" />
