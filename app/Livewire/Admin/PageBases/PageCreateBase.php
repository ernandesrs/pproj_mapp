<?php

namespace App\Livewire\Admin\PageBases;

abstract class PageCreateBase extends PageBase
{
    /**
     * Model class
     *
     * @var null|string
     */
    public $modelClass = null;

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
}
