<?php

namespace App\Livewire\Admin\PageBases;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class PageListItem extends Component
{
    /**
     * Model item instance
     *
     * @var Model
     */
    public Model $item;

    /**
     * Item columns
     *
     * @var array
     */
    public array $columns;

    /**
     * Render
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire..admin.page-bases.page-list-item');
    }

    /**
     *
     *
     * * * ITEM ACTIONS
     *
     *
     */

    /**
     * List item show
     *
     * @return void
     */
    function show()
    {
        $this->dispatch('showPageItem', id: $this->item->id);
    }

    /**
     * List item edit
     *
     * @return void
     */
    function edit()
    {
        $this->dispatch('editPageItem', id: $this->item->id);
    }

    /**
     * List item delete
     *
     * @return void
     */
    function delete()
    {
        $this->dispatch('deletePageItem', id: $this->item->id);
    }

    /**
     *
     *
     * * * ITEM COLUMNS
     *
     *
     */

    /**
     * Get columns
     *
     * @return array
     */
    function getColumns()
    {
        return $this->columns;
    }

    /**
     * Get column content
     *
     * @param array $column
     * @return null|string
     */
    function getColumnContent(array $column)
    {
        $columnContent = '';

        if (isset($column['key'])) {
            $colKey = $column['key'];

            if (is_array($column['key'])) {
                $item = $this->item;
                $columnContent = implode(' ', array_map(function ($key) use ($item) {
                    return $item->$key;
                }, $colKey));
            } else {
                $columnContent = $this->item->$colKey;
            }

            if (($column['type'] ?? null) == 'date') {
                $columnContent = \Illuminate\Support\Carbon::make($columnContent)->format('d/m/Y H:i');
            }
        } elseif (isset($column['view'])) {
            $columnContent = $column['view'];
        }

        return $columnContent;
    }
}
