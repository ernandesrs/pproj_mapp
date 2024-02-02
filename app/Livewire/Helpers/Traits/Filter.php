<?php

namespace App\Livewire\Helpers\Traits;

use Livewire\Attributes\Url;

trait Filter
{
    /**
     * Search
     *
     * @var string
     */
    #[Url(except: '')]
    public string $search = '';

    /**
     * Order by created at
     *
     * @var string
     */
    #[Url(except: '')]
    public string $orderBy_created_at = '';

    /**
     * Order by updated at
     *
     * @var string
     */
    #[Url(except: '')]
    public string $orderBy_updated_at = '';

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
        $modelInstance = $this->getModelInstance();

        if ($this->searchableFields()) {
            if (!empty($this->search)) {
                $modelInstance = $modelInstance
                    ->whereRaw("MATCH(" . implode(',', $this->searchableFields()) . ") AGAINST(? IN BOOLEAN MODE)", [$this->search]);
            }
        }

        $modelInstance = $this->sort($modelInstance);

        return $modelInstance;
    }

    /**
     * Sort
     *
     * @param \Illuminate\Database\Eloquent\Model $modelInstance
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function sort($modelInstance)
    {
        if (!$this->isFilterable()) {
            return $modelInstance;
        }

        $sortableFields = ['created_at', 'updated_at'];

        foreach ($sortableFields as $sf) {
            $prop = 'orderBy_' . $sf;
            if (isset($this->$prop) && !empty($this->$prop) && in_array($this->$prop, ['asc', 'desc'])) {
                $modelInstance = $modelInstance->orderBy($sf, $this->$prop);
            }
        }

        return $modelInstance;
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
        return true;
    }
}
