<?php

namespace App\Livewire\Helpers\Traits;

use Livewire\Attributes\Url;

trait AsListPage
{
    use AsPage;

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
        return $this->filter()->paginate(15);
    }

    /**
     * Apply filter
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    function filter()
    {
        if (!$this->isFiltering()) {
            return (new($this->getModelClass())());
        }

        $modelInstance = new($this->getModelClass())();

        if (!empty($this->search)) {
            $modelInstance = $modelInstance->whereRaw("MATCH(first_name,last_name,username,email) AGAINST(? IN BOOLEAN MODE)", [$this->search]);
        }

        return $modelInstance;
    }

    /**
     * Check if this request is a filtering
     *
     * @return boolean
     */
    private function isFiltering()
    {
        return !empty($this->search);
    }
}
