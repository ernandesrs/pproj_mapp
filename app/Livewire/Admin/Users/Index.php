<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageListBase;
use App\Models\User;
use Livewire\Attributes\Url;

class Index extends PageListBase
{
    public $modelClass = User::class;

    /**
     * Undocumented variable
     *
     * @var string
     */
    #[Url(except: '')]
    public $orderBy_first_name = '';

    /**
     * Undocumented variable
     *
     * @var string
     */
    #[Url(except: '')]
    public $orderBy_username = '';

    function tableColumnData()
    {
        return [
            [
                'label' => __('admin/words.avatar'),
                'view' => 'livewire.admin.users.avatar'
            ],
            [
                'label' => __('admin/words.details'),
                'view' => 'livewire.admin.users.details'
            ],
            [
                'label' => __('admin/words.username'),
                'key' => 'username'
            ],
            [
                'label' => __('admin/words.roles'),
                'view' => 'livewire.admin.users.roles'
            ],
            [
                'label' => __('admin/words.create_date'),
                'key' => 'created_at',
                'type' => 'date'
            ]
        ];
    }

    function searchableFields()
    {
        return ['first_name', 'last_name', 'username', 'email'];
    }

    function sortableFields()
    {
        return [
            [
                'label' => __('admin/words.first_name'),
                'model' => 'orderBy_first_name',
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
            ],
            [
                'label' => __('admin/words.username'),
                'model' => 'orderBy_username',
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

    function setPageActions()
    {
        return [
            [
                'text' => __('admin/layout.administrators'),
                'href' => route('admin.users.administrators'),
                'icon' => 'shield-shaded'
            ]
        ];
    }

    function setPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/layout.users'),
                'href' => route('admin.users.index'),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/layout.users');
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
