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
     * Uncontained
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
     *
     *
     * CRUD METHODS
     *
     *
     */

    /**
     * Delete one item
     *
     * @param mixed $id
     *
     * @return void
     */
    #[On('deletePageItem')]
    function deleteOne($id)
    {
        /**
         * @var \Illuminate\Database\Eloquent\Model
         */
        $model = $this->getModelInstance()->where('id', $id)->firstOrFail();

        $model->delete();
    }

    /**
     *
     *
     * GENERAL METHODS
     *
     *
     */

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
     * Model instance
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function getModelInstance()
    {
        return new $this->modelClass();
    }

    /**
     *
     *
     * TABLE METHODS
     *
     *
     */

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
    function tableColumnData()
    {
        return [];
    }

    function showListItemActions()
    {
        return true;
    }

    function getTableColumnData()
    {
        $arr = $this->tableColumnData();

        if ($this->showListItemActions()) {
            $arr = [
                ...$arr,
                [
                    'label' => '',
                    'actions' => [
                        'delete' => true
                    ]
                ],
            ];
        }

        return $arr;
    }
}
