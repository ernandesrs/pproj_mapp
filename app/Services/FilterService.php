<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FilterService
{
    /**
     * Request
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Model instance
     *
     * @var Model|Builder
     */
    protected Model|Builder $modelInstance;

    /**
     * Searchable fields
     *
     * @var array
     */
    protected array $searchableFields;

    function __construct(Model $modelInstance, array $searchable = [])
    {
        $this->request = \Request::instance();

        $this->modelInstance = $modelInstance;
        $this->searchableFields = $searchable;
    }

    static function start(Model $modelInstance, array $searchable = [])
    {
        return new FilterService($modelInstance, $searchable);
    }

    function apply()
    {
        $searchBy = $this->request->get('search', null);

        if (!empty($searchBy)) {
            $this->modelInstance = $this->modelInstance
                ->whereRaw("MATCH(" . implode(',', $this->searchableFields) . ") AGAINST(? IN BOOLEAN MODE)", [$searchBy]);
        }

        return $this->modelInstance;
    }

    static function isFiltering()
    {
        return !empty($this->search);
    }
}
