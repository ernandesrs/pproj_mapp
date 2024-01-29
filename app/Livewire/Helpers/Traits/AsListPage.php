<?php

namespace App\Livewire\Helpers\Traits;

use Livewire\Attributes\Url;

trait AsListPage
{
    use AsPage, Filter;

    /**
     * Search
     *
     * @var string
     */
    #[Url(except: '')]
    public string $search = '';

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
        return $this->filter();
    }
}
