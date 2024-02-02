<?php

namespace App\Livewire\Admin\PageBases;

abstract class PageEditBase extends PageBase
{
    /**
     * Model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    public $model = null;

    /**
     * Data
     *
     * @var array
     */
    public $data = [];

    /**
     * Route name to list items
     *
     * @return string
     */
    abstract function listRouteName();

    /**
     * Route name to show item
     *
     * @return string
     */
    abstract function showRouteName();

    /**
     * Route name to create item
     *
     * @return string
     */
    abstract function createRouteName();

    /**
     * Route name to edit item
     *
     * @return string
     */
    abstract function editRouteName();

    /**
     * Mount
     *
     * @param mixed ...$vars
     * @return void
     */
    function mount(...$vars)
    {
        if (empty($this->model)) {
            $this->fails[] = 'Needs a value to public propertie model';
        } else {
            $this->modelClass = $this->model::class;

            $this->data = $this->model->toArray();
        }

        return parent::mount();
    }

    /**
     * Render
     *
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire..admin.page-bases.page-edit-base')
            ->layout('livewire.admin.layout')
            ->title($this->getLayoutTitle());
    }

    /**
     * Update model
     *
     * @return void
     */
    function save()
    {
        $validated = $this->validate();

        $this->model->update($validated['data']);
    }
}
