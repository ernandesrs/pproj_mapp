<?php

namespace App\Livewire\Helpers\Traits;

trait AsListPage
{
    use AsPage, Filter;

    /**
     * Model class
     *
     * @return string
     */
    abstract function getModelClass();

    /**
     * List model instance
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function getPageList()
    {
        return $this->filter()->paginate(15);
    }
}
