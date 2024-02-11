<?php

namespace App\Livewire\Admin\PageBases;

trait BaseTrait
{
    /**
     * Model plural
     *
     * @var string
     */
    public $modelName = null;

    /**
     * Model name in plural
     *
     * @var string
     */
    public $modelNamePlural = null;

    /**
     * Route name to list items
     *
     * @return null|string
     */
    function indexRouteName()
    {
        return $this->baseRouteName('index');
    }

    /**
     * Route name to show item
     *
     * @return null|string
     */
    function showRouteName()
    {
        return $this->baseRouteName('show');
    }

    /**
     * Route name to create item
     *
     * @return null|string
     */
    function createRouteName()
    {
        return $this->baseRouteName('create');
    }

    /**
     * Route name to edit item
     *
     * @return null|string
     */
    function editRouteName()
    {
        return $this->baseRouteName('edit');
    }

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
     * Base route name
     *
     * @param string $name
     *
     * @return string
     */
    private function baseRouteName(string $name)
    {
        return 'admin.' . (!empty($this->modelNamePlural) ? $this->modelNamePlural : $this->getModelAsParamNameToRoute() . 's') . '.' . $name;
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
