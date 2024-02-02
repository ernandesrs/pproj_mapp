<?php

namespace App\Livewire\Admin\PageBases;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class PageListItem extends Component
{
    public Model $item;

    public null|array|string $columns;

    /**
     * Undocumented function
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
     * Actions
     *
     *
     */

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
        $val = '';

        if (isset($column['key'])) {
            $colKey = $column['key'];

            if (is_array($column['key'])) {
                $item = $this->item;
                $val = implode(' ', array_map(function ($key) use ($item) {
                    return $item->$key;
                }, $colKey));
            } else {
                $val = $this->item->$colKey;
            }
        }

        return $val;
    }
}
