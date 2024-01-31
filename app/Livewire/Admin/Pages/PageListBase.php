<?php

namespace App\Livewire\Admin\Pages;

abstract class PageListBase extends PageBase
{
    /**
     * View content
     *
     * @var string
     */
    public $viewContent = 'pages.page-list-base';

    /**
     * Model class
     *
     * @var string
     */
    public $modelClass = '';

    /**
     * Mount
     *
     * @return void
     */
    function mount()
    {
        if (empty($this->modelClass)) {
            $this->fails[] = 'Needs a value to public propertie "modelClass"';
        }

        return parent::mount();
    }

    /**
     * List model instance
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function getPageList()
    {
        return (new $this->modelClass())
            ->query()
            ->paginate(15);
    }
}
