<?php

namespace App\Livewire\Admin\PageBases;

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
     * List model instance
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function getPageList()
    {
        return (new $this->modelClass())
            ->query()
            ->paginate(15);
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
     *      'callback' => fn($item) => $item->name,
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
