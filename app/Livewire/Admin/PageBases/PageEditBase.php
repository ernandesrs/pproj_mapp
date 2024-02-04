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
     * Page create action
     *
     * @return null|array
     */
    function setPageCreateAction()
    {
        return
            $this->createRouteName() ?
            [
                'text' => __('admin/worlds.new') . ' ' . __('admin/worlds.' . $this->getModelAsParamNameToRoute()),
                'href' => route($this->createRouteName()),
                'icon' => 'plus-lg',
                'show' => \Auth::user()->can('create', $this->modelClass)
            ] : null;
    }

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
        $this->authorize('update', $this->model);

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
        $this->authorize('update', $this->model);

        $validated = $this->validate();

        $this->model->update($validated['data']);
    }
}
