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
        return $this->filter();
    }

    /**
     * Apply filter
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function filter()
    {
        $modelInstance = new($this->getModelClass())();

        if ($this->isFiltering()) {
            if (!empty($this->search)) {
                $modelInstance = $modelInstance
                    ->whereRaw("MATCH(" . implode(',', $modelInstance::searchableFields) . ") AGAINST(? IN BOOLEAN MODE)", [$this->search]);
            }
        }

        return $modelInstance->paginate(15);
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
