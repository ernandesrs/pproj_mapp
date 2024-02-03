<?php

namespace App\Livewire\Admin\PageBases;

trait BaseTrait
{
    /**
     * Route name to list items
     *
     * @return null|string
     */
    abstract function indexRouteName();

    /**
     * Route name to show item
     *
     * @return null|string
     */
    abstract function showRouteName();

    /**
     * Route name to create item
     *
     * @return null|string
     */
    abstract function createRouteName();

    /**
     * Route name to edit item
     *
     * @return null|string
     */
    abstract function editRouteName();

    /**
     * Defines whether or not to show the delete button by returning true or false
     *
     * @return bool
     */
    function actionDelete()
    {
        return false;
    }

    /**
     * Get model as route param name
     *
     * @return string
     */
    function getModelAsParamNameToRoute()
    {
        $modelClassArr = explode('\\', $this->modelClass);
        return strtolower(end($modelClassArr));
    }
}
