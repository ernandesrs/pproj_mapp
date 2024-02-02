<?php

namespace App\Livewire\Admin\PageBases;

trait BaseTrait
{

    /**
     * Must return a valid route name to list items.
     *
     * @return string
     */
    function actionList()
    {
        return null;
    }

    /**
     * Must return a valid route name to display the item. If null the button will not be displayed.
     *
     * @return null|string
     */
    function actionShow()
    {
        return null;
    }

    /**
     * Must return a valid route name to edit the item. If null the button will not be displayed.
     *
     * @return null|string
     */
    function actionEdit()
    {
        return null;
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
