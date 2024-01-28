<?php

namespace App\Livewire\Helpers\Traits;

trait AsListPage
{
    use AsPage;

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
        return (new($this->getModelClass())())->paginate(15);
    }
}
