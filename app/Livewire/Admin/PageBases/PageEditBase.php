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
     * Mount
     *
     * @param mixed ...$vars
     * @return void
     */
    function mount(...$vars)
    {
        if (empty($this->model)) {
            $this->fails[] = 'Needs a value to public propertie model';
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
}
