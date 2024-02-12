<?php

namespace App\Livewire\Admin\PageBases;

use App\Livewire\Helpers\Traits\Filter;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\WithPagination;

abstract class PageListBase extends PageBase
{
    use WithPagination, Filter;

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
     * Define the table columns data
     *
     * Each item in the array must be an array with the following characteristics:
     * [
     *      'label' => 'Name',
     *      'key' => ['first_name','last_name'],
     *      OR
     *      'view' => 'components.count',
     * ]
     *
     * @return array
     */
    abstract function tableColumnData();

    /**
     * Page create action
     *
     * @return null|array
     */
    function setPageCreateAction()
    {
        return
            $this->createRouteName() ?
            [
                'text' => __('admin/words.new') . ' ' . __('admin/words.' . $this->getModelAsParamNameToRoute()),
                'href' => route($this->createRouteName()),
                'icon' => 'plus-lg',
                'show' => \Auth::user()->can('create', $this->modelClass)
            ] : null;
    }

    /**
     * Mount
     *
     * @return void
     */
    function mount(...$vars)
    {
        if (empty($this->modelClass)) {
            $this->fails[] = 'Needs a value to public propertie "modelClass"';
        }

        return parent::mount();
    }

    /**
     * Render
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    function render()
    {
        $this->authorize('viewAny', $this->modelClass);

        return parent::render();
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
        $this->redirect(route($this->showRouteName(), [$this->getModelAsParamNameToRoute() => $id]), true);
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
        $this->redirect(route($this->editRouteName(), [$this->getModelAsParamNameToRoute() => $id]), true);
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

        $this->authorize('delete', $model);

        $model->delete();

        $this->alert()->info(__('admin/alerts.success_on_delete'))->alertify();
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
        return $this->filter()
            ->paginate(15);
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
    function getTableColumnData(?Model $model = null)
    {
        $arr = $this->tableColumnData();

        if ($this->showListItemActions()) {
            $arr = [
                ...$arr,
                [
                    'label' => '',
                    'actions' => [
                        'show' => $this->showRouteName() ? \Auth::user()->can('view', $model) : false,
                        'edit' => $this->editRouteName() ? \Auth::user()->can('update', $model) : false,
                        'delete' => $this->actionDelete() ? \Auth::user()->can('delete', $model) : false,
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
        return $this->showRouteName() || $this->editRouteName() || $this->actionDelete();
    }
}
