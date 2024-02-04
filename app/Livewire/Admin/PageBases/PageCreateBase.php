<?php

namespace App\Livewire\Admin\PageBases;

abstract class PageCreateBase extends PageBase
{
    /**
     * Data
     *
     * @var array
     */
    public $data = [];

    /**
     * Set page create action
     *
     * @return array
     */
    function setPageCreateAction()
    {
        return [];
    }

    /**
     * Mount
     *
     * @param mixed ...$vars
     * @return void
     */
    function mount(...$vars)
    {
        if (empty($this->modelClass)) {
            $this->fails[] = 'Needs a value to public propertie modeClass';
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
        $this->authorize('create', $this->modelClass);

        return view('livewire..admin.page-bases.page-create-base')
            ->layout('livewire.admin.layout')
            ->title($this->getLayoutTitle());
    }

    /**
     * Save
     *
     * @return void
     */
    function save()
    {
        $this->authorize('create', $this->modelClass);

        $validated = $this->validate();

        $created = (new $this->modelClass())::create($validated['data']);

        $this->redirect(
            route(
                $this->editRouteName(),
                [$this->getModelAsParamNameToRoute() => $created->id]
            ),
            true
        );
    }
}
