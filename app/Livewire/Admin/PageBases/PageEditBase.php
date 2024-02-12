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
                'text' => __('admin/words.new') . ' ' . __('admin/words.' . $this->getModelAsParamNameToRoute()),
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

        if ($this->modelService) {
            $this->modelService::update($this->model, $validated['data']);
        } else {
            $this->model->update($validated['data']);
        }

        $this->alert()->success(__('admin/alerts.success_on_update'))->alertify();
    }
}
