<?php

namespace App\Livewire\Admin\PageBases;

use Livewire\Attributes\On;

abstract class PageListBase extends PageBase
{
    /**
     * View content
     *
     * @var string
     */
    public $viewContent = 'page-bases.page-list-base';

    /**
     * Uncontained: this defines that the page should have no background color or internal margins
     *
     * @var bool
     */
    public $uncontained = true;

    /**
     * Model class
     *
     * @var string
     */
    public $modelClass = '';

    /**
     * Mount
     *
     * @return void
     */
    function mount()
    {
        if (empty($this->modelClass)) {
            $this->fails[] = 'Needs a value to public propertie "modelClass"';
        }

        return parent::mount();
    }

    /**
     * Define the table columns data
     *
     * Each item in the array must be an array with the following characteristics:
     * [
     *      'label' => 'Name',
     *      'key' => ['first_name','last_name'],
     * ]
     *
     * @return array
     */
    abstract function tableColumnData();

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
     *
     *
     * * * CRUD METHODS
     *
     *
     */

    /**
     * Show item
     *
     * @param int $id
     *
     * @return void
     */
    #[On('showPageItem')]
    function show(int $id)
    {
        $this->redirect(route($this->actionShow(), [$this->getModelAsParamNameToRoute() => $id]), true);
    }

    /**
     * Edit item
     *
     * @param int $id
     *
     * @return void
     */
    #[On('editPageItem')]
    function edit(int $id)
    {
        $this->redirect(route($this->actionEdit(), [$this->getModelAsParamNameToRoute() => $id]), true);
    }

    /**
     * Delete one item
     *
     * @param int $id
     *
     * @return void
     */
    #[On('deletePageItem')]
    function deleteOne(int $id)
    {
        /**
         * @var \Illuminate\Database\Eloquent\Model
         */
        $model = $this->getModelInstance($id)->firstOrFail();

        $model->delete();
    }

    /**
     *
     *
     * * * GENERAL METHODS
     *
     *
     */

    /**
     * Model instance
     *
     * @param null|int $id
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
     */
    function getModelInstance(?int $id = null)
    {
        return $id ? (new $this->modelClass())->where('id', $id) : new $this->modelClass();
    }

    /**
     * List model instance
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function getPageList()
    {
        return $this->getModelInstance()
            ->query()
            ->paginate(15);
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

    /**
     *
     *
     * * * LIST METHODS
     *
     *
     */

    /**
     * Get table columns data
     *
     * @return array
     */
    function getTableColumnData()
    {
        $arr = $this->tableColumnData();

        if ($this->showListItemActions()) {
            $arr = [
                ...$arr,
                [
                    'label' => '',
                    'actions' => [
                        'show' => $this->actionShow() ? true : false,
                        'edit' => $this->actionEdit() ?? false,
                        'delete' => $this->actionDelete(),
                    ]
                ],
            ];
        }

        return $arr;
    }

    /**
     * Check if show/hidden list actions(show/edit/delete)
     *
     * @return bool
     */
    function showListItemActions()
    {
        return $this->actionShow() || $this->actionEdit() || $this->actionDelete();
    }
}
