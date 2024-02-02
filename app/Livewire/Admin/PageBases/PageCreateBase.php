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
