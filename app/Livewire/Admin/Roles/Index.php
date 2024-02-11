<?php

namespace App\Livewire\Admin\Roles;

use App\Livewire\Admin\PageBases\PageListBase;
use App\Models\Role;
use Livewire\Attributes\Url;

class Index extends PageListBase
{
    public $modelClass = Role::class;

    /**
     * Undocumented variable
     *
     * @var string
     */
    #[Url(except: '')]
    public $orderBy_name = '';

    function sortableFields()
    {
        return [
            [
                'label' => __('admin/words.name'),
                'model' => 'orderBy_name',
                'options' => [
                    [
                        'label' => __('admin/words.none'),
                        'value' => ''
                    ],
                    [
                        'label' => 'A-Z',
                        'value' => 'asc'
                    ],
                    [
                        'label' => 'Z-A',
                        'value' => 'desc'
                    ]
                ]
            ]
        ];
    }

    function tableColumnData()
    {
        return [
            [
                'label' => __('admin/words.name'),
                'key' => ['name']
            ],
            [
                'label' => __('admin/words.users') . ' ' . strtolower(__('admin/words.linkeds')),
                'view' => 'livewire.admin.roles.count'
            ],
            [
                'label' => __('admin/words.create_date'),
                'key' => ['created_at'],
                'type' => 'date'
            ]
        ];
    }

    function searchableFields()
    {
        return ['name'];
    }

    function setPageActions()
    {
        return [];
    }

    function setPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/words.roles'),
                'href' => route('admin.roles.index'),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/words.roles');
    }

    function showRouteName()
    {
        return null;
    }

    function actionDelete()
    {
        return true;
    }
}
