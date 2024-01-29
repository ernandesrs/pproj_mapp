<?php

namespace App\Livewire\Helpers\Traits;

trait Filter
{
    /**
     * Add searchable fields
     *
     * @return null|array
     */
    abstract function searchableFields();

    /**
     * Apply filter
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function filter()
    {
        $modelInstance = new($this->getModelClass())();

        if ($this->isFiltering() && $this->searchableFields()) {
            if (!empty($this->search)) {
                $modelInstance = $modelInstance
                    ->whereRaw("MATCH(" . implode(',', $this->searchableFields()) . ") AGAINST(? IN BOOLEAN MODE)", [$this->search]);
            }
        }

        return $modelInstance->paginate(15);
    }

    /**
     * Check if list is searchable
     *
     * @return bool
     */
    public function isSearchable()
    {
        return count($this->searchableFields() ?? []) > 0;
    }

    /**
     * Check if list is filterable
     *
     * @return bool
     */
    public function isFilterable()
    {
        return false;
    }

    /**
     * Check if this request is a filtering
     *
     * @return bool
     */
    private function isFiltering()
    {
        return !empty($this->search);
    }
}
